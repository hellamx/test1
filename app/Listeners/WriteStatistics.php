<?php

namespace App\Listeners;

use App\Events\OrderProductCreated;
use App\Models\Statistic;
use Illuminate\Support\Carbon;

class WriteStatistics
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(OrderProductCreated $event): void
    {
        Statistic::query()->create([
            //'date' => Carbon::today()->subDays(rand(0, 365)),
            'date' => time(),
            'product_id' => $event->orderProduct->product_id,
        ]);
    }
}
