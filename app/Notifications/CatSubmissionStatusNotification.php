<?php

namespace App\Notifications;

use App\Models\CatSubmission;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;

class CatSubmissionStatusNotification extends Notification
{
    use Queueable;

    protected $submission;
    protected $status;
    protected $reason;

    /**
     * Buat notifikasi.
     *
     * @param  CatSubmission  $submission
     * @param  string|null  $status  Status pengajuan: 'approved' atau 'rejected'
     */
    public function __construct(CatSubmission $submission, ?string $status = null, ?string $reason = null)
    {
        $this->submission = $submission;
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
            $message = "Pengajuan kucing '{$this->submission->name}' telah disetujui dan sekarang tersedia untuk diadopsi.";
        } elseif ($this->status === 'rejected') {
            $message = "Pengajuan kucing '{$this->submission->name}' telah ditolak.";
            if ($this->reason) {
                $message .= " Alasan: {$this->reason}";
            }
        }

        return [
            'type' => 'cat_submission',
            'message' => $message,
            'cat_submission_id' => $this->submission->id,
            'status' => $this->status,
        ];
    }
}
