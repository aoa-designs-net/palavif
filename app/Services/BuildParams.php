<?php

namespace App\Services;


class BuildParams
{

    /**
     * Create array of data for page
     *
     * @param  \App\Models\User  $user
     * @param  array $needed
     * @return array $needed
     */
    public static function client(\App\Models\User $user, array $needed = [])
    {
        // Include user in request to the page
        // Determine if User $user is a newly registered user 
        // Determine if User $user has wallet
        $needed = array_merge($needed, [
            'user' => $user,
            'new_registered_user' => request()->session()->get('new_registered_user'),
            'user_wallet' => $user->loadMissing('wallet')->wallet ? true : false
        ]);

        if ($needed['new_registered_user']) {
            $needed['user_wallet'] = true; // Disable Wallet Pop-Up for now
        }

        if (!$needed['user_wallet']) {
            $needed = array_merge($needed, [
                'banks' => \App\Models\BankList::all(),
            ]); // User doesnot have a wallet initiated
        }
        return $needed;
    }
}
