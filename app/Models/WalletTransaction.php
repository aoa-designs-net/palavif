<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class WalletTransaction extends Model
{
    use SoftDeletes;

    const STATUS = ['pending' => 'PENDING', 'failed' => 'FAILED', 'success' => 'SUCCESS'];
    const CONTEXT = ['funding' => 'FUNDING ACCOUNT', 'refund' => 'REFUND TO ACCOUNT', 'withdrawal' => 'WITHDRAW FROM ACCOUNT'];
    const TYPE = ['debit' => 'DEBIT', 'credit' => 'CREDIT'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = ['user_id'];
    
    /**
     * The "booted" method of the model.
     *
     * @return void
     */
    protected static function booted()
    {
        static::creating(function ($transaction) {
            $transaction->transaction_id = \App\Traits\GenerateUniqueIdentity::generate('wallet_transactions', 'TR-', 'transaction_id'); // Generate Unique Transaction ID
        });
    }
}
