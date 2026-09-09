<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;



class CatHasBeenAdoptedNotification extends Notification
{
    protected $cat;
    protected $adopter;

    public function __construct($cat, $adopter)
    {
        $this->cat = $cat;
        $this->adopter = $adopter;
    }

    public function via($notifiable)
    {
        return ['database']; // atau salah satu
    }

    public function toDatabase($notifiable)
    {
        return [
            'message' => 'Kucing kamu dengan nama "' . $this->cat->name . '" pengajuan adopsi disetujui dan ingin diadopsi oleh ' . $this->adopter->name . '.',
            'cat_id' => $this->cat->id,
            'adopter_id' => $this->adopter->id,
        ];
    }
}
