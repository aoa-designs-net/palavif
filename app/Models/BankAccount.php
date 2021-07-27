<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BankAccount extends Model
{
    const ACCOUNT_VERIFIER = ['paystack' => 'PAYSTACK'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = ['verified_by', 'verifier_response'];

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id', 'uuid', 'created_at', 'updated_at'];

     /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'verifier_response' => 'array',
    ];

    /**
     * The "booted" method of the model.
     *
     * @return void
     */
    protected static function booted()
    {
        static::creating(function ($account) {
            $account->uuid = (string) \Illuminate\Support\Str::uuid(); // Create uuid when a new user is to be created 
        });
    }
}
