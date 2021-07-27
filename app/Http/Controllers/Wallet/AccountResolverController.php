<?php

namespace App\Http\Controllers\Wallet;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;

class AccountResolverController extends Controller
{
    /**
     * Initialize Wallet Creation Steps
     *
     * @param  \Illuminate\Http\Request  $request
     * 
     * @return \Illuminate\Http\Response
     */
    public function handle(Request $request)
    {
        if ($request->ajax()) {
            $validator = Validator::make($request->all(), [
                'account_number'       =>  'bail|required|numeric|unique:user_bank_accounts,account_number',
                'bank_code'            => 'bail|required|string|exists:bank_lists,code'
            ]);
            if ($validator->fails()) {
                return response()->json([
                    'error' => $validator->errors()->first()
                ], 422);
            }
            return $this->bankAccountResolved($request->input('account_number'), $request->input('bank_code'));
        }
        return back();
    }

    /**
     * Paystack Bank Account Number Resolver(API)
     *
     * @param  int  $account_number
     * @param  string $bank_code
     * 
     * @return \Illuminate\Http\Response
     */
    protected function bankAccountResolved(int $account_number, string $bank_code)
    {
        // Step 1 Make Request to Paystack to Confirm User Account Number Details
        $response = Http::withToken(env('PAYSTACK_SECRET_KEY'))->get('https://api.paystack.co/bank/resolve',  ['account_number' => $account_number, 'bank_code' => $bank_code]);
        if (($response->failed()) || ($response->collect()->get('status') !== true)) {
            return response()->json([
                'error' => 'Error verifying account number'
            ], $response->status());
        }
        // Step 2 convert response to collection
        $data = $response->collect()->get('data');
        // Step 3 Record response in database
        $bank_account = \App\Models\BankAccount::firstOrCreate([
            'account_number' => $data['account_number']
        ], [
            'account_name' => $data['account_name'],
            'verifier_response' => $response->json()
        ]);
        return response()->json([
            'status' => true,
            'data' => [
                'uuid' => $bank_account->uuid,
                'account_name' => $bank_account->account_name,
            ]
        ], $response->status());
    }
}
