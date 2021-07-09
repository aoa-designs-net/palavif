<?php

namespace App\Http\Controllers\Wallet;

use Illuminate\Http\Request;
use Illuminate\Http\Client\Pool;
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
        if ($request->ajax()) {
            // validate Request
            // $request->validate([
            //     'account_number_bank' => 'bail|required|numeric|unique:user_bank_accounts,account_number',
            //     'bank_code'            => 'bail|required|string'
            // ]);
            $validator = \Illuminate\Support\Facades\Validator::make($request->all(), [
                'account_number_bank' =>  'bail|required|numeric|unique:user_bank_accounts,account_number',
                'bank_code'            => 'bail|required|string'
            ]);
            if ($validator->fails()) {
                return response()->json([
                    'errors' => $validator->errors(),
                    'error' => 'The account number bank has already been taken.'
                ], 422);
            }
            // Step 1 Make Request to Paystack to Confirm User Account Number Details
            $response = Http::withToken(env('PAYSTACK_SECRET_KEY'))->get('https://api.paystack.co/bank/resolve',  ['account_number' => $request->account_number_bank, 'bank_code' => $request->bank_code]);

            if (($response->clientError()) || ($response->serverError()) || ($response->failed()) || ($response->collect()->get('status') !== true)) {
                return response()->json([
                    'error' => 'Error verifying account number'
                ], $response->status());
            }
            $data = $response->collect()->get('data');
            $request->user()->bank_account()->create([
                'account_name' => $data['account_name'],
                'account_number' => $data['account_number'],
                'verifier_response' => $response->json()
            ]);
            return $response->json();
        }

        // Step 2 Create Virtual Account on Monnify
        if ($request->user()->has('bank_account')) {
            \App\Jobs\WalletCreation::dispatch($request->user());
            return back()->with('success', 'Account Creation initiated');
        }
        return back()->with('error', 'Bank Account not Verified');
    }
}
