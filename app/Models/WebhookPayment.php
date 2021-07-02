<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WebhookPayment extends Model
{

    const FROM = [
        'monnify' => 'MONNIFY',
        'paystack' => 'PAYSTACK'
    ];

    const TYPE = [
        'monnify_reserved_account' => 'RESERVED_ACCOUNT'
    ];

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['created_at', 'updated_at'];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'data' => 'array',
    ];

    /**
     * The "booted" method of the model.
     *
     * @return void
     */
    protected static function booted()
    {
        static::saving(function ($user) {
            $user->user_ip = request()->ip();
            $user->user_agent = request()->userAgent();
        });
    }

    /**
     * Verify if Webhook is not treated
     * 
     * @param  string $payment_reference
     * 
     * @return bool
     */
    public static function verify(string $payment_reference)
    {
        return WebhookPayment::where('payment_reference', $payment_reference)->doesntExist();
    }

    
}
