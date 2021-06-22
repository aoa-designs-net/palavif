<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserBankAccount extends Model
{

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = ['user_id', 'verified_by', 'verifier_response'];

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id', 'user_id', 'created_at', 'updated_at'];

    const ACCOUNT_VERIFIER = ['paystack'];

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
        static::creating(function ($user) {
            $user->user_id = auth()->user()->id; // Attach Authenticated User ID 
        });
    }
}
