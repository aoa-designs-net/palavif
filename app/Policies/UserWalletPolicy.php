<?php

namespace App\Policies;

use App\Models\User;
use App\Models\UserWallet;
use Illuminate\Auth\Access\Response;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserWalletPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->wallet
                ? Response::allow()
                : Response::deny('You do not own this post.');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\UserWallet  $userWallet
     * @return mixed
     */
    public function view(User $user, UserWallet $userWallet)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\UserWallet  $userWallet
     * @return mixed
     */
    public function update(User $user, UserWallet $userWallet)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\UserWallet  $userWallet
     * @return mixed
     */
    public function delete(User $user, UserWallet $userWallet)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\UserWallet  $userWallet
     * @return mixed
     */
    public function restore(User $user, UserWallet $userWallet)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\UserWallet  $userWallet
     * @return mixed
     */
    public function forceDelete(User $user, UserWallet $userWallet)
    {
        //
    }
}
