<?php

namespace App\Notifications;

use App\Models\Compaign;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class InterestedCampaign extends Notification
{
    use Queueable;
    public Compaign $compaign;
    /**
     * Create a new notification instance.
     *
     * @param Compaign $compaign
     */
    public function __construct(Compaign $compaign)
    {
        $this->compaign = $compaign;
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
            ->subject('Interested Campaign ongoing')
            ->greeting('Hello!')
            ->line('We are excited to inform you that a campaign you expressed interest in is now live!')
            ->action('View Campaign', route('compaigns.index'))
            ->line('Campaign Name: ' . $this->compaign->name)
            ->line('Campaign Description: ' . $this->compaign->description)
            ->line('Thank you for your continued support!')
            ->line('If you have any questions, feel free to reach out to us.')
            ->salutation('Best Regards,')
            ->line('The Team');
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
