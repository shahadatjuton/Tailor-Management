<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Auth;

class NotifyForSize extends Notification
{
    use Queueable;
    public $order_details;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($order_details)
    {
        $this->order_details = $order_details;
        $this->user = Auth::user();
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

                    ->greeting('Dear '.  $this->order_details->order->user->name.'!')
                    ->subject('Request for update dress size')
                    ->line('This is to inform you that your order no'.$this->order_details->order->invoice_no.
                        ' have to update dress size. To update dress size click below:')
                    ->action('Click Here', route('customer.cart.order.details',$this->order_details->id))

                    ->line('We are requesting you to update the dress size asap'.
                        'We are eagerly waiting for your modification. Thank you!');

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
