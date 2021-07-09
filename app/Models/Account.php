<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    public const GENDER = ['male' => 'MALE', 'female' => 'FEMALE', 'others' => "OTHERS"];

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['uuid', 'id'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = ['user_id'];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = ['user_avatar'];

    /**
     * Get the user's full name.
     *
     * @return string
     */
    public function getUserAvatarAttribute()
    {
        if ($this->avatar) {
            return asset($this->avatar);
        } elseif ($this->gender == Account::GENDER['male']) {
            return asset('default/user/male.png');
        } elseif ($this->gender == Account::GENDER['female']) {
            return asset('default/user/female.png');
        }
        return asset('default/user/others.png');
    }
}
