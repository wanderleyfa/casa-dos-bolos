<?php

namespace App\Observers;

use App\Http\Controllers\MailController;
use App\Models\Cake;

class CakeInventoryUpdateObserver
{
    /**
     * Handle the Cake "created" event.
     *
     * @param  \App\Models\Cake  $cake
     * @return void
     */
    public function created(Cake $cake)
    {
        //
    }

    /**
     * Handle the Cake "updated" event.
     *
     * @param  \App\Models\Cake  $cake
     * @return void
     */
    public function updated(Cake $cake)
    {
        $mail = new MailController($cake);
        $mail->sendEmail();
    }

    /**
     * Handle the Cake "deleted" event.
     *
     * @param  \App\Models\Cake  $cake
     * @return void
     */
    public function deleted(Cake $cake)
    {
        //
    }

    /**
     * Handle the Cake "restored" event.
     *
     * @param  \App\Models\Cake  $cake
     * @return void
     */
    public function restored(Cake $cake)
    {
        //
    }

    /**
     * Handle the Cake "force deleted" event.
     *
     * @param  \App\Models\Cake  $cake
     * @return void
     */
    public function forceDeleted(Cake $cake)
    {
        //
    }
}
