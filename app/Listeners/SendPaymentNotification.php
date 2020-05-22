<?php

namespace App\Listeners;

use App\Events\PaymentPaid;
use App\Notifications\PaymentPaidNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Notification;

class SendPaymentNotification implements ShouldQueue
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(PaymentPaid $event)
    {
        $event->user->notify(new PaymentPaidNotification($event->payment));
    }


}
