<?php

namespace App\Policies;

use App\Models\Toko;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class TokoPolicy
{
    use HandlesAuthorization;

    public function before($user, $ability) {
        if($user->hasRole('admin')) {
            return true;
        }
    }

    public function browse(User $user) {

        return $user->hasRole('pedagang');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Toko  $toko
     * @return mixed
     */
    public function read(User $user, Toko $toko)
    {
        return $user->id == $toko->user_id;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function add(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Toko  $toko
     * @return mixed
     */
    public function edit(User $user, Toko $toko)
    {
        return $user->id == $toko->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Toko  $toko
     * @return mixed
     */
    public function delete(User $user, Toko $toko)
    {
        return $user->id == $toko->user_id;
    }
}
