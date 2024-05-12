<?php

namespace App\Listeners;

use App\Events\BookingMade;
use App\Mail\booked;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class BookingMadeListener
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
     * @param  \App\Events\BookingMade  $event
     * @return void
     */
    public function handle(BookingMade $event)
    {
        $booking = $event->booking;

        // Send email notification
        Mail::to('admin@510.com')->send(new booked($booking));
    }
}
