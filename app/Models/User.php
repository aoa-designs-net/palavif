<?php

namespace App\Models;

use App\Scopes\ActiveScope;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable, SoftDeletes;

    const STATUS = ['active' => 'ACTIVE', 'inactive' => 'INACTIVE', 'suspended' => 'SUSPENDED'];
    const TYPE = ['admin' => 'ADMINISTRATOR', 'client' => 'CLIENT', 'owner' => 'OWNER'];
    // const LEVEL = ['unpaid', 'paid'];


    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['created_at', 'updated_at', 'id', 'deleted_at', 'referral_link'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'id',
        'password',
        'remember_token',
    ];

    /**
     * The relationships that should always be loaded.
     *
     * @var array
     */
    protected $with = ['account'];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The "booted" method of the model.
     *
     * @return void
     */
    protected static function booted()
    {
        static::addGlobalScope(new ActiveScope);
        static::creating(function ($user) {
            $user->uuid = (string) \Illuminate\Support\Str::uuid(); // Create uuid when a new user is to be created 
        });
    }

    /**
     * Get the Account associated with the user.
     */
    public function account()
    {
        return $this->hasOne(Account::class);
    }

    /**
     * Get the Bank Account Verified of the user.
     */
    public function bank_account()
    {
        return $this->hasOne(UserBankAccount::class);
    }

    /**
     * Get the Wallet Account of the user.
     */
    public function wallet()
    {
        return $this->hasOne(UserWallet::class);
    }
}
