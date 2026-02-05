<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewMemberAlert extends Notification implements ShouldQueue
{
    use Queueable;

    public $user;

    /**
     * Create a new notification instance.
     */
    public function __construct($user)
    {
        $this->user = $user;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        $role = ucfirst(str_replace('_', ' ', $this->user->role));
        
        $mail = (new MailMessage)
                    ->subject('New Registration: ' . $this->user->name)
                    ->line('A new user has registered on the directory.')
                    ->line('**Name:** ' . $this->user->name)
                    ->line('**Email:** ' . $this->user->email)
                    ->line('**Role:** ' . $role);

        if ($this->user->role === 'business_owner' && $this->user->listings()->exists()) {
             $listing = $this->user->listings()->first();
             $mail->line('**Business Name:** ' . $listing->title);
        }

        return $mail->action('View User', url('/admin/users/' . $this->user->id));
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
