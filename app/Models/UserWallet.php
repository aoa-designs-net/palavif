<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserWallet extends Model
{
    use SoftDeletes;

    const STATUS = ['active' => 'ACTIVE', 'inactive' => 'INACTIVE'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = ['user_id', 'account_reference'];

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['wallet_id', 'deleted_at', 'created_at', 'updated_at'];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'recent_transaction_history' => 'array',
        'virtual_accounts' => 'array'
    ];

    /**
     * The "booted" method of the model.
     *
     * @return void
     */
    protected static function booted()
    {
        static::creating(function ($transaction) {
            $transaction->wallet_id = \App\Traits\GenerateUniqueIdentity::generate('user_wallets', 'WAL-', 'wallet_id'); // Generate Unique Wallet ID
        });
    }

    /**
     * Get the User that owns this wallet.
     */
    public function user()
    {
        return $this->hasOne(User::class, 'id','user_id');
    }
}
