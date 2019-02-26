<?php

namespace Modules\V1\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class issueNotification extends Notification
{
    use Queueable;

    public $body;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($body)
    {
        $this->body = $body;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }


    /**
     * Get the mail representation of the notification.
     *
     * @param mixed $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->line('this is a: ' . $this->body->object_kind)
            ->line('issue_title: ' . $this->body->issue_title)
            ->line('issue_description: ' . $this->body->issue_description)
            ->line('issue_state: ' . $this->body->issue_state)
            ->line('assigned_to_name: ' . $this->body->assigned_to_name)
            ->line('assigned_to_avatar: ' . $this->body->assigned_to_avatar);
    }

    /**
     * Get the array representation of the notification.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [];
    }
}
