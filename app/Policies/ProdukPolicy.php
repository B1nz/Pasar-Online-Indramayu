<?php

namespace App\Policies;

use App\Models\Produk;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProdukPolicy
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
     * @param  \App\Models\Produk  $produk
     * @return mixed
     */
    public function read(User $user, Produk $produk)
    {
        if(empty($produk->toko)) {
            return false;
        }

        return $user->id == $produk->toko->user_id;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function add(User $user)
    {
        return $user->hasRole('pedagang');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Produk  $produk
     * @return mixed
     */
    public function edit(User $user, Produk $produk)
    {
        if(empty($produk->toko)) {
            return false;
        }

        return $user->id == $produk->toko->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Produk  $produk
     * @return mixed
     */
    public function delete(User $user, Produk $produk)
    {
        if(empty($produk->toko)) {
            return false;
        }

        return $user->id == $produk->toko->user_id;
    }
}
