<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NotifyPayment extends Notification
{
    use Queueable;
    public $order;
    public $user;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($order, $user)
    {
        $this->user = $user;
        $this->order = $order;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)

                    ->greeting('Dear'.$this->user->name)
                    ->subject('Payment Confirmation')
                    ->line('This is to inform you that'. $this->order->total_amount.'has been accepted for Order no'.$this->order->invoice_no.
                        ' . To see the order click below:')
                    ->line('Thank You for payment');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
