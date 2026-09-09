@extends('layouts.catsubmission')

@section('title', $title)

@section('catsubmission-content')
<div class="max-w-4xl mx-auto bg-white rounded-3xl shadow-lg p-8">

    <h1 class="text-2xl font-semibold mb-8 text-[#578E7E]">{{ $title }}</h1>

    <div class="md:grid md:grid-cols-3 md:gap-8">
        {{-- Bagian gambar utama --}}
        <div class="md:col-span-1 mb-8 md:mb-0">
            @php
            $images = ($type === 'cat') ? $submission->images : ($submission->cat ? $submission->cat->images : collect());
            $mainImage = $images->first();
            $otherImages = $images->skip(1); // Gambar selain utama
            @endphp

            {{-- Gambar utama --}}
            <div class="flex justify-center mb-4">
                @if($mainImage)
                <img src="{{ asset('storage/' . $mainImage->image_path) }}"
                    alt="Gambar Utama {{ $type === 'cat' ? 'Kucing' : 'Kucing Adopsi' }}"
                    class="w-full max-w-xs rounded-3xl shadow-lg object-cover border border-sage">
                @else
                <div class="w-full max-w-xs h-64 bg-cream rounded-3xl flex items-center justify-center text-gray-400 italic">
                    Tidak ada gambar
                </div>
                @endif
            </div>

            {{-- Gambar lainnya --}}
            @if ($otherImages->count() > 0)
            <div class="flex flex-wrap justify-center gap-3">
                @foreach ($otherImages as $image)
                <img src="{{ asset('storage/' . $image->image_path) }}"
                    alt="Gambar tambahan"
                    class="w-full max-w-xs object-cover rounded-xl border border-gray-200 shadow-sm">
                @endforeach
            </div>
            @endif
        </div>

        {{-- Detail --}}
        <div class="md:col-span-2 space-y-6 text-softgray">

            {{-- Nama dan Status --}}
            <div class="flex justify-between items-center">
                <h2 class="text-2xl font-semibold">
                    {{ $type === 'cat' ? $submission->name : ($submission->cat->name ?? '-') }}
                </h2>
                <span class="px-3 py-1 text-sm rounded-full
                    @if($submission->status === 'pending') bg-orange-100 text-orange-600
                    @elseif($submission->status === 'approved') bg-green-100 text-green-600
                    @else bg-red-100 text-red-600 @endif">
                    {{ ucfirst($submission->status) }}
                </span>
            </div>

            {{-- Konten --}}
            @if ($type === 'cat')
            {{-- Grid 2 kolom --}}
            <div class="grid md:grid-cols-2 gap-x-6 gap-y-4 font-medium">
                <div>
                    <p class="text-gray-500">Nama Pemilik</p>
                    <p>{{ $submission->owner_name ?? '-' }}</p>
                </div>
                <div>
                    <p class="text-gray-500">Alamat</p>
                    <p>{{ $submission->address->address ?? '-' }}</p>
                </div>
                <div>
                    <p class="text-gray-500">Umur</p>
                    <p>{{ $submission->age ?? '-' }} bulan</p>
                </div>
                <div>
                    <p class="text-gray-500">Jenis Kelamin</p>
                    <p>
                        @if($submission->gender === 'male')
                        Jantan
                        @elseif($submission->gender === 'female')
                        Betina
                        @else
                        -
                        @endif
                    </p>
                </div>
                <div>
                    <p class="text-gray-500">Jenis Kucing</p>
                    <p>{{ $submission->breed->name ?? '-' }}</p>
                </div>
                <div>
                    <p class="text-gray-500">Lokasi Google Maps</p>
                    @if ($submission->google_maps_link)
                    <a href="{{ $submission->google_maps_link }}" target="_blank" class="text-blue-600 hover:underline">
                        Klik disini
                    </a>
                    @else
                    <p>-</p>
                    @endif
                </div>
            </div>

            {{-- Deskripsi --}}
            <div class="pt-6 mt-6 border-t">
                <h3 class="font-semibold mb-1">Deskripsi</h3>
                <p class="leading-relaxed">{{ $submission->description ?? '-' }}</p>
            </div>

            @else

            {{-- Info pengaju --}}
            <div class="grid md:grid-cols-2 gap-x-6 gap-y-4 font-medium">
                <div>
                    <p class="font-semibold">Nama Pengaju Adopsi</p>
                    <p>{{ $submission->applicant->name ?? '-' }}</p>
                </div>
                <div>
                    <p class="font-semibold">Pesan Pengajuan</p>
                    <p>{{ $submission->message ?? '-' }}</p>
                </div>
            </div>

            {{-- Data kucing --}}
            @if ($submission->cat)
            <div class="mt-6 border-t pt-6">
                <h3 class="text-lg font-semibold mb-4 text-[#578E7E]">Informasi Kucing</h3>
                <div class="grid md:grid-cols-2 gap-x-6 gap-y-4 font-medium">
                    <div>
                        <p class="text-gray-500">Nama Kucing</p>
                        <p>{{ $submission->cat->name ?? '-' }}</p>
                    </div>
                    <div>
                        <p class="text-gray-500">Umur</p>
                        <p>{{ $submission->cat->age ?? '-' }} bulan</p>
                    </div>
                    <div>
                        <p class="text-gray-500">Jenis Kelamin</p>
                        <p>
                            @if($submission->cat->gender === 'male')
                            Jantan
                            @elseif($submission->cat->gender === 'female')
                            Betina
                            @else
                            -
                            @endif
                        </p>
                    </div>
                    <div>
                        <p class="text-gray-500">Jenis Kucing</p>
                        <p>{{ $submission->cat->breed->name ?? '-' }}</p>
                    </div>
                </div>
            </div>
            @endif

            {{-- Kontak jika disetujui --}}
            @if ($submission->status === 'approved')
            <div class="mt-4 p-4 bg-green-50 border border-green-200 rounded-lg text-green-700 space-y-1">
                <p><strong>Kontak Pemilik:</strong> {{ $submission->cat->owner_name ?? '-' }}</p>
                <p><strong>Kontak Pemilik:</strong> {{ $submission->cat->owner_contact ?? '-' }}</p>

                <div class="mt-2 flex items-center gap-2">
                    <strong>Lokasi Google Maps:</strong>
                    @if ($submission->cat && $submission->cat->google_maps_link)
                    <a href="{{ $submission->cat->google_maps_link }}" target="_blank" class="text-blue-600 hover:underline">
                        Klik disini
                    </a>
                    @else
                    <span>-</span>
                    @endif
                </div>
            </div>
            @endif
            @endif

            {{-- Tanggal --}}
            <p class="text-sm text-gray-500 italic">
                Diajukan pada: {{ $submission->created_at->format('d M Y, H:i') }}
            </p>
        </div>
    </div>

    {{-- Tombol kembali --}}
    <div class="flex justify-between items-center mt-10">
        <a href="{{ route('adoptions.catsubmission.index') }}" class="text-sm text-gray-600 hover:underline">← Kembali</a>
    </div>
</div>
@endsection