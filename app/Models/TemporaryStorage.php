<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TemporaryStorage extends Model
{
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
            $user->uuid = (string) \Illuminate\Support\Str::uuid(); // Create uuid when a new user is to be created 
        });
    }
}
