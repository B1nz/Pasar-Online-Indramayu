<?php

namespace App\Observers;

use App\Mail\TokoActivated;
use App\Models\Toko;
use Illuminate\Support\Facades\Mail;

class TokoObserver
{
    /**
     * Handle the Toko "created" event.
     *
     * @param  \App\Models\Toko  $toko
     * @return void
     */
    public function created(Toko $toko)
    {
        //
    }

    /**
     * Handle the Toko "updated" event.
     *
     * @param  \App\Models\Toko  $toko
     * @return void
     */
    public function updated(Toko $toko)
    {

        // Cek toko sudah aktif

        if($toko->getOriginal('is_active') == false && $toko->is_active == true) {

            // Kirim email ke customer
            Mail::to($toko->owner)->send(new TokoActivated($toko));

            // Update Role jadi pedagang
            $toko->owner->setRole('pedagang');

        } else {
            // dd('toko belum aktif');
        }
    }

    /**
     * Handle the Toko "deleted" event.
     *
     * @param  \App\Models\Toko  $toko
     * @return void
     */
    public function deleted(Toko $toko)
    {
        //
    }

    /**
     * Handle the Toko "restored" event.
     *
     * @param  \App\Models\Toko  $toko
     * @return void
     */
    public function restored(Toko $toko)
    {
        //
    }

    /**
     * Handle the Toko "force deleted" event.
     *
     * @param  \App\Models\Toko  $toko
     * @return void
     */
    public function forceDeleted(Toko $toko)
    {
        //
    }
}
