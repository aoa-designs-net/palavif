<?php

namespace App\Http\Controllers\Wallet;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;

class CreateWalletController extends Controller
{
    /**
     * Initialize Wallet Creation Steps
     *
     * @param  \Illuminate\Http\Request  $request
     * 
     * @return \Illuminate\Http\Response
     */
    public function initialize(Request $request)
    {
        // dd($request->all());
        // Step 1 Validate request
        $request->validate([
            'resolved_account_uuid' => 'required|uuid|exists:bank_accounts,uuid'
        ]);
        // Step 2 Register Account Number to the User

        // Step 3 Create Virtual Account on Monnify for user 

        // Verify user doesnot have wallet before
        if ($request->user()->has('bank_account')) {
            \App\Jobs\WalletCreation::dispatch($request->user())->afterCommit();
            
            return back()->with('success', 'Account Creation initiated');
        }
        return back()->with('error', 'Bank Account not Verified');
    }
}
