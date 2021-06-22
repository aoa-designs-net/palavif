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
            // return true;
            // validate Request
            $request->validate([
                'account_number_bank' => 'required|numeric|unique:user_bank_accounts,account_number',
                'bank_code'            => 'required|string'
            ]);
            // Step 1 Make Request to Paystack to Confirm User Account Number Details
            $response = Http::retry(2, 100)->withToken(env('PAYSTACK_SECRET_KEY'))->get('https://api.paystack.co/bank/resolve',  ['account_number' => $request->account_number_bank, 'bank_code' => $request->bank_code]);

            if (($response->clientError()) || ($response->serverError()) || ($response->failed()) || ($response->collect()->get('status') !== true)) {
                return $response->throw()->json();
            }
            $data = $response->collect()->get('data');
            $request->user()->bank_account()->create([
                'account_name' => $data['account_name'],
                'account_number' => $data['account_number'],
                'verifier_response' => $response->json()
            ]);
            return $response->json();
        }
        $monnify_auth = Http::retry(2, 100)->withToken(base64_encode(env('MONNIFY_API_KEY') . ':' . env('MONNIFY_SECRET_KEY')), 'Basic')->post('https://sandbox.monnify.com/api/v1/auth/login', []);
        (string )$accessToken = $monnify_auth->json()['responseBody']['accessToken'];
        // Step 2 Create Virtual Account on Monnify
        \App\Jobs\WalletCreation::dispatch($request->user(), $accessToken);

        // dd($accessToken, collect($accessToken)->isNotEmpty());

        return back()->with('success', 'Account Creation initiated');
    }
}
