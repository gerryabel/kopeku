<?php

namespace App\Exports;

use App\Models\Adoption;
use Illuminate\Support\Collection;
use Carbon\Carbon;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Border;

use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver as GdDriver;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithDrawings;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\WithColumnWidths;

class AdoptionSubmissionsExport implements FromCollection, WithHeadings, WithStyles, WithColumnWidths, WithEvents, WithDrawings
{
    protected $data;

    protected $rowCounter = 3;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function collection(): Collection
    {
        return $this->data->map(function ($item, $index) {
            return [
                'No'             => $index + 1,
                'Gambar'         => '', // gambar sekarang kolom B
                'Nama Kucing'    => $item->cat->name ?? '-',
                'Nama Pemohon'   => $item->user->name ?? '-',
                'Alasan Adopsi'  => $item->message,
                'Jenis Kelamin'  => $item->cat->gender === 'male' ? 'Jantan' : 'Betina',
                'Jenis Kucing'   => $item->cat->breed->name ?? '-',
                'Tanggal'        => Carbon::parse($item->created_at)->translatedFormat('d F Y'),
                'Status'         => ucfirst($item->status),
            ];
        });
    }

    public function headings(): array
    {
        return [
            ['Pengajuan Adopsi Kucing'],
            ['No', 'Gambar', 'Nama Kucing', 'Nama Pemohon', 'Alasan Adopsi', 'Jenis Kelamin', 'Jenis Kucing', 'Tanggal Pengajuan', 'Status']
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            1 => [ // Judul
                'font' => ['bold' => true, 'size' => 16, 'color' => ['rgb' => '1E5631']],
                'alignment' => ['horizontal' => 'center'],
            ],
            2 => [ // Header tabel
                'font' => ['bold' => true, 'color' => ['rgb' => 'FFFFFF']],
                'fill' => [
                    'fillType' => Fill::FILL_SOLID,
                    'startColor' => ['rgb' => '609966']
                ],
                'alignment' => ['horizontal' => 'center'],
            ],
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $sheet = $event->sheet->getDelegate();

                $rowCount = $sheet->getHighestRow();

                // Merge judul
                $sheet->mergeCells('A1:I1');

                // Tambah border
                $styleArray = [
                    'borders' => [
                        'allBorders' => [
                            'borderStyle' => Border::BORDER_THIN,
                            'color' => ['argb' => 'FF999999'],
                        ],
                    ],
                ];
                $sheet->getStyle("A2:I{$rowCount}")->applyFromArray($styleArray);

                // Rata tengah kecuali alasan
                foreach (range('A', 'I') as $col) {
                    $alignment = ($col === 'D') ? 'left' : 'center';
                    $sheet->getStyle("{$col}3:{$col}{$rowCount}")
                        ->getAlignment()->setHorizontal($alignment);
                    $sheet->getStyle("{$col}3:{$col}{$rowCount}")
                        ->getAlignment()->setVertical('center');
                }

                // Warna status + zebra stripe
                for ($row = 3; $row <= $rowCount; $row++) {
                    $statusCell = 'I' . $row;
                    $status = strtolower($sheet->getCell($statusCell)->getValue());

                    $statusColor = match ($status) {
                        'approved' => 'C6EFCE',
                        'pending'  => 'FFF4CC',
                        'rejected' => 'F8CBAD',
                        default    => 'FFFFFF',
                    };
                    $sheet->getStyle($statusCell)->getFill()->setFillType(Fill::FILL_SOLID)
                        ->getStartColor()->setARGB($statusColor);

                    if ($row % 2 === 0) {
                        $sheet->getStyle("A{$row}:G{$row}")->getFill()->setFillType(Fill::FILL_SOLID)
                            ->getStartColor()->setRGB('F9F9F9');
                    }
                }

                foreach ($this->data as $index => $item) {
                    $row = 3 + $index;
                    $sheet->getRowDimension($row)->setRowHeight(95); // Ubah sesuai kebutuhan
                }
            },
        ];
    }

    public function columnWidths(): array
    {
        return [
            'A' => 6,    // No
            'B' => 30,   // Gambar (pindah ke sini)
            'C' => 20,   // Nama Kucing
            'D' => 20,   // Nama Pemohon
            'E' => 30,   // Alasan Adopsi
            'F' => 15,   // Jenis Kelamin
            'G' => 15,   // Jenis Kucing
            'H' => 20,   // Tanggal
            'I' => 15,   // Status
        ];
    }

    public function drawings()
    {
        $drawings = [];
        $manager = new ImageManager(new GdDriver()); // ← Tambahkan config driver di sini

        foreach ($this->data as $index => $item) {
            $catImage = $item->cat->images->first();

            if ($catImage && $catImage->image_path && Storage::disk('public')->exists($catImage->image_path)) {
                $originalPath = storage_path('app/public/' . $catImage->image_path);

                $resizedPath = storage_path('app/temp-resized/resized_' . basename($catImage->image_path));

                if (!file_exists($resizedPath)) {
                    $image = $manager->read($originalPath)->scale(width: 150)->toJpeg(quality: 60);

                    if (!file_exists(dirname($resizedPath))) {
                        mkdir(dirname($resizedPath), 0755, true);
                    }

                    $image->save($resizedPath);
                }

                $drawing = new Drawing();
                $drawing->setName('Cat Image');
                $drawing->setDescription('Cat Image');
                $drawing->setPath($resizedPath);
                $drawing->setHeight(80);
                $drawing->setCoordinates('B' . ($this->rowCounter + $index));
                $drawings[] = $drawing;
            }
        }

        return $drawings;
    }
}
