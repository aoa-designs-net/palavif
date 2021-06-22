<?php

namespace App\Http\Controllers\Auth\Traits;

use App\Models\UserActivity;

trait ActivityReporter
{
    /**
     * Create an activity log
     * 
     * @param  string  $type
     * @param  string  $severity
     * @param  string  $severity
     * @param  string  $request_from
     * @param  string  $message
     * 
     * @return boolean
     */
    public static function reporting(int $user_id, string $type, string $severity, string $actionUrl, string $message)
    {
        return self::attepmtLogging($user_id, $type, $severity, $actionUrl, $message);
    }

    /**
     * Attempt to record the user log into the application.
     *
     * @param  string  $type
     * @param  string  $severity
     * @param  string  $severity
     * @param  string  $request_from
     * @param  string  $message
     * 
     * @return boolean
     */
    protected static function attepmtLogging(int $user_id, string $type, string $severity, string $actionUrl, string $message)
    {
        return collect(UserActivity::create([
            'user_id'                   =>  $user_id,
            'type'                      =>  $type,
            'severity'                  =>  $severity,
            'action_url'                =>  $actionUrl,
            'message'                   =>  $message,
        ]))->isNotEmpty() ? true : false;
    }
}
