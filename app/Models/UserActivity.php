<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserActivity extends Model
{
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['created_at', 'updated_at', 'id', 'ip_address', 'user_agent', 'request_url'];

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
        static::saving(function ($log) {
            // $log->user_id = request()->user()->id; // The User making the Request, If not Authenticated, Null is stored
            $log->ip_address = request()->ip(); // Ip Address of the user making the request
            $log->user_agent = request()->userAgent(); // User Agent of the user making the request
            $log->request_url = request()->fullUrl(); // The full url the request is from
        });
    }
}
