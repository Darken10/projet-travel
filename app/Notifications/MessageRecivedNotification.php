<?php

namespace App\Notifications;

use App\Models\Chat\Message;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class MessageRecivedNotification extends Notification
{
    use Queueable;



    /**
     * Create a new notification instance.
     */
    public function __construct(private Message $message)
    {
        $this->message = $message;
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
        return (new MailMessage)
                    ->line($this->message->from->name .' vous a envoyé un nouveau message')
                    ->line('Contenu')
                    ->line($this->message->message)
                    ->action('Voir le message', route('chat.show',$this->message->from_id))
                    ->line('Mercie beaucoup pour votre fidelité!');
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
