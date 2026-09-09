<?php

namespace App\Notifications;

use App\Models\Cat;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;

class AdoptionStatusNotification extends Notification
{
    use Queueable;

    protected $cat;
    protected $status;
    protected $reason;

    /**
     * Buat notifikasi.
     *
     * @param  Cat $cat
     * @param  string|null $status  Status adopsi: 'approved' atau 'rejected'
     */
    public function __construct(Cat $cat, ?string $status = null, ?string $reason = null)
    {
        $this->cat = $cat;
        $this->status = $status;
        $this->reason = $reason;
    }

    public function via($notifiable)
    {
        return ['database'];
    }

    public function toArray($notifiable)
    {
        if ($this->status === 'approved') {
            $message = "Pengajuan adopsi kucing '{$this->cat->name}' telah disetujui.";
        } elseif ($this->status === 'rejected') {
            $message = "Pengajuan adopsi kucing '{$this->cat->name}' telah ditolak.";
            if ($this->reason) {
                $message .= " Alasan: {$this->reason}";
            }
        }

        return [
            'type' => 'adoption_request',
            'message' => $message,
            'cat_id' => $this->cat->id,
            'status' => $this->status,
        ];
    }
}
