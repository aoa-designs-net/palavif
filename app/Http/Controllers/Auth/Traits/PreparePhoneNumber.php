<?php

namespace App\Http\Controllers\Auth\Traits;

trait PreparePhoneNumber
{
    /**
     * Accept Phone number to be formatted
     * 
     * @param  string  $phone_number
     * @return int
     */
    public static function take(string $phone_number)
    {
        return \Illuminate\Support\Str::of($phone_number)->replaceMatches('/[^A-Za-z0-9]++/', '');
        // return \Illuminate\Support\Str::of($phone_number)->replaceFirst('+234', '0')->replaceMatches('/[^A-Za-z0-9]++/', '');
    }
}
