<?php

namespace App\Traits;

use App\Models\UserWallet;
use App\Models\WalletTransaction;

trait UpdateWallet
{
    public $current_records;
    public $params;
    protected $old;
    protected $addition;
    // protected const $type = [
    //     // 
    // ];

    /**
     * Update User Wallet for both debit or credit transactions
     * 
     * @param \App\Models\UserWallet $wallet
     * @param \App\Models\WalletTransaction $transaction
     * 
     * @return array
     */
    public static function store(UserWallet $wallet, WalletTransaction $transaction)
    {
        return self::update($wallet, $transaction);
    }

    /**
     * Update the user wallet for both debit and credit transactions
     * 
     * @param \App\Models\UserWallet $wallet
     * @param \App\Models\WalletTransaction $transaction
     * 
     * @return array
     */
    protected static function update(UserWallet $wallet, WalletTransaction $transaction)
    {
        return $wallet->update([
            'opening_balance' => $wallet->closing_balance,
            'closing_balance' => self::balance($wallet->closing_balance, $wallet['amount'], $transaction['type'])
        ]);
    }

    /**
     * Update the user wallet for both debit and credit transactions
     * 
     * @param int $old
     * @param int $difference
     * @param string $type
     * 
     * @return int
     */
    protected static function balance(int $old, int $difference, string $type)
    {
        if ($type == WalletTransaction::TYPE['credit']) {
            return (int)($old + $difference);
        } elseif ($type == WalletTransaction::TYPE['debit']) {
            return (int)($old - $difference);
        }
        return (int)$old;
    }
}
