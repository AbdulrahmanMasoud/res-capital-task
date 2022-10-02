<?php

namespace App\Observers;

use App\Models\Advertising;

class AdvertisingObserver
{
    /**
     * Handle the Advertising "created" event.
     *
     * @param  \App\Models\Advertising  $advertising
     * @return void
     */
    public function created(Advertising $advertising)
    {
        //
    }

    /**
     * Handle the Advertising "updated" event.
     *
     * @param  \App\Models\Advertising  $advertising
     * @return void
     */
    public function updated(Advertising $advertising)
    {
        //
    }

    /**
     * Handle the Advertising "deleted" event.
     *
     * @param  \App\Models\Advertising  $advertising
     * @return void
     */
    public function deleted(Advertising $advertising)
    {

    }

    /**
     * Handle the Advertising "restored" event.
     *
     * @param  \App\Models\Advertising  $advertising
     * @return void
     */
    public function restored(Advertising $advertising)
    {
        //
    }

    /**
     * Handle the Advertising "force deleted" event.
     *
     * @param  \App\Models\Advertising  $advertising
     * @return void
     */
    public function forceDeleted(Advertising $advertising)
    {
    }
}
