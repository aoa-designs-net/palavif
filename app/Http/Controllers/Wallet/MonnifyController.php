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
                $user_wallet = \App\Models\UserWallet::where('virtual_account_reference', $body['product']['reference'])->with('user')->firstOrFail();
                $transaction = WalletTransaction::create([
                    'user_id' => $user_wallet['user']['id'],
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
