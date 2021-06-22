<?php

namespace App\Http\Controllers\Portal;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Show the application's login form.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        (array) $needed = [
            'user' => $request->user(),
            'user_created_wallet' => $request->user()->loadMissing('wallet')->wallet ? true : false // Change thic code later to use method from user model
        ];
        if (!$needed['user_created_wallet']) {
            // User doesnot have a wallet initiated
            $needed = array_merge($needed, [
                'user_created_wallet' => false,
                'banks' => \App\Models\BankList::all(),
            ]);
        } else {
            // User has wallet
            $needed = array_merge($needed, [
                'wallet_balance' => $request->user()->loadMissing('wallet')->wallet,
            ]);
        }
        // $request->session()->flash('success', 'I got served');
        return view('dashboard.client.index', $needed);
    }
}
