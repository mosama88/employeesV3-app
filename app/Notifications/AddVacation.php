<?php

namespace App\Notifications;

use App\Models\Vacation;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Notifications\Notification;

class AddVacation extends Notification
{
    use Queueable;

    private $vacationNotify;

    /**
     * Create a new notification instance.
     */
    public function __construct(Vacation $vacationNotify)
    {
    
        $this->vacationNotify = $vacationNotify;

    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via($notifiable): array
    {
        return ['database'];
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toDatabase($notifiable): array
    {
        return [
            'id' => $this->vacationNotify->id,
            'title' => 'تم أضافة أجازه جديدة :',
            'user' => Auth::user()->name,
        ];
    }
}
