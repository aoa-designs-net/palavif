<?php

namespace App\Jobs;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Http;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use App\Http\Controllers\Auth\Traits\ActivityReporter;

class WalletCreation implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * The need token.
     *
     * @var string  $token
     */
    protected $response;

    /**
     * The need token.
     *
     * @var string  $token
     */
    protected $token;

    /**
     * The user instance.
     *
     * @var \App\User
     */
    protected $user;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user = $user;
        // $this->token = $token;
        $this->getAccessToken();
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        \Illuminate\Support\Facades\Log::info('This User: (' . $this->user->uuid . ') is creating A Wallet Using the Token:' . $this->token);
        // Create Palavif Wallet
        $wallet = $this->user->wallet()->create([
            'virtual_account_reference' => \App\Traits\GenerateUniqueIdentity::generateReference('user_wallets', 'virtual_account_reference'),
            'recent_transaction_history' => [],
            'virtual_accounts' => []
        ]);

        // API Request To Monnify to Create Virtual Wallet
        $response = Http::retry(2, 50)->withToken($this->token)->post('https://sandbox.monnify.com/api/v2/bank-transfer/reserved-accounts', [
            "accountReference" => $wallet['virtual_account_reference'],
            "accountName" => $this->user->bank_account->account_name,
            "currencyCode" => "NGN",
            "contractCode" => env('MONNIFY_CONTRACT_CODE'),
            "customerEmail" =>  $this->user->email,
            "customerName" => $this->user->name,
            "getAllAvailableBanks" => true
        ]);
        \Illuminate\Support\Facades\Log::info($this->user->uuid . ': is created A Wallet Using the Token:', $response->json());

        $transaction_response = $response->json();
        if ($response->successful() && $transaction_response['requestSuccessful']) {
            $transaction = ['virtual_account_response' => $transaction_response['responseBody']];
            $newTransaction = \App\Traits\MergeTransactionHistory::merger($wallet->recent_transaction_history, $transaction);
            $wallet->recent_transaction_history = $newTransaction;
            $virtual_accounts = [];
            foreach ($transaction_response['responseBody']['accounts'] as $key => $account) {
                array_push($virtual_accounts, [
                    'bank_name' => $account['bankName'],
                    'account_number' => $account['accountNumber'],
                    'bank_code'     => $account['bankCode'],
                    'account_name' => $account['accountName']
                ]);
            }
            $wallet->virtual_accounts = $virtual_accounts;
            $wallet->status = \App\Models\UserWallet::STATUS['active'];
            $wallet->save();
        }

        ActivityReporter::reporting($this->user->id, "Profile", 'informational', '', $this->user->name . ' Created A Wallet');
    }

    /**
     * Get the Access Token from Monnify.
     *
     * @return string
     */
    protected function getAccessToken()
    {
        $monnify_auth = Http::retry(2, 100)->withToken(base64_encode(env('MONNIFY_API_KEY') . ':' . env('MONNIFY_SECRET_KEY')), 'Basic')->post('https://sandbox.monnify.com/api/v1/auth/login', []);
        (string)$this->token = $monnify_auth->json()['responseBody']['accessToken'];
    }
}
