<?php

namespace App\Http\Controllers\Wallet;

use Illuminate\Http\Request;
use App\Models\WebhookPayment;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Models\WalletTransaction;

class MonnifyController extends Controller
{

    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $request->validate([
            'paymentReference' => 'required|string',
            'amountPaid' => 'required|string',
            'paidOn' => 'required|string',
            'transactionReference' => 'required|string',
            'transactionHash' => 'required|string',
        ]);
        Log::warning('monnnify', $request->all());
        // $request['paymentReference'] = "MNFY|00|20210702140348|000634";
        // $request['amountPaid'] = "1800.00";
        // $request['paidOn'] = "02/07/2021 02:03:49 PM";
        // $request['transactionReference'] = "MNFY|00|20210702140348|000634";
        // $request['transactionHash'] = 'd2ec9af827a4d0a33cb79085bef24b1e64b80550b1953e91186fb056dbfd2d102f90e2dff8eb98f6c5562c146639b8a986a9a5277009fae2467c10538704b05b';

        $hashed = hash('sha512',  env('MONNIFY_SECRET_KEY') . '|' . $request['paymentReference'] . '|' . $request['amountPaid'] . '|' . $request['paidOn'] . '|' . $request['transactionReference']);
        // check if webhook is unique
        if (((string)$hashed === (string)$request['transactionHash']) && (WebhookPayment::verify((string)$request['paymentReference']))) {
            $this->handle($request->all());
            return response()->json('accepted', 202);
        }
    }

    /**
     * Handle new webhook request
     * 
     * @param  array  $body
     * @return void
     */
    protected function handle(array $body)
    {
        \Illuminate\Support\Facades\DB::transaction(function () use ($body) {
            // Check webhook type of transaction
            if (!empty($body['product']['type']) &&  ($body['product']['type'] == WebhookPayment::TYPE['monnify_reserved_account'])) {
                $user_wallet = \App\Models\UserWallet::where('virtual_account_reference', $body['product']['reference'])->firstOrFail();
                $transaction = WalletTransaction::create([
                    'amount' => $body['settlementAmount'],
                    'type' => $body['paymentStatus'] == "PAID" ? WalletTransaction::TYPE['credit'] : WalletTransaction::TYPE['debit'],
                    'context' => $body['paymentStatus'] == "PAID" ? WalletTransaction::CONTEXT['funding'] : WalletTransaction::CONTEXT['withdrawal'],
                    'status' => WalletTransaction::STATUS['success'],
                ]);
                \App\Traits\UpdateWallet::store($user_wallet, $transaction);
            }
            WebhookPayment::create([
                'payment_reference' => (string) $body['paymentReference'],
                'from' => WebhookPayment::FROM['monnify'],
                'data' => $body
            ]);
        }, 2);
    }
}
