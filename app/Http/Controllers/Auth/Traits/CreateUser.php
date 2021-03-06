<?php

namespace App\Http\Controllers\Auth\Traits;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

trait CreateUser
{
    use ActivityReporter;

    protected $registred;

    /**
     * Create a New User Instance for the Application
     * 
     * @param  array  $data
     * 
     * @return \App\Models\User|Null
     */
    public function createUser(array $validated)
    {
        return $this->attemptCreatingUser($validated);
    }

    /**
     * Handle Creation of New User for the Application
     *
     * @param  array $valid
     * 
     * @throws Illuminate\Database\Eloquent\ModelNotFoundException
     * @return \App\Models\User|NULL
     */
    protected function attemptCreatingUser(array $valid)
    {
        (object) $user = NULL;

        DB::transaction(function () use ($valid, &$user) {
            // Find the User data in temporary table
            if (!empty($valid['user'])) {
                $avaliableRecord = \App\Models\TemporaryStorage::where('uuid', $valid['user'])->firstOrFail();
                $valid = array_merge($valid, $avaliableRecord['data']);
            }
            // Register the User
            $user = User::create([
                'name' => $valid['first-name'] . " " . $valid['last-name'],
                'email' => $valid['email_address'],
                'username' => \Illuminate\Support\Str::lower($valid['your_username']),
                'phone_number' => PreparePhoneNumber::take($valid['userPhoneNumber']),
                'password' => Hash::make($valid['password']),
                'type' => $valid['type']
            ]);
            // Register User Account details
            $user->account()->create([
                'first_name'            => $valid['first-name'],
                'last_name'             => $valid['last-name'],
                'date_of_birth'         => $valid['date_of_birth'],
                'phone_number'          => $user->phone_number,
                'phone_country'         => $valid['location'],
                'location'              => $valid['location'],
                'sponsor_id'            => !empty($valid['sponsor-username']) ? $this->getSponsorID($valid['sponsor-username']) : null,
                'gender'                => $valid['gender-select'],
                'referral_link'         => env('APP_URL', url()->current()) . '/register?referral=' . $user->username,
            ]);

            // Created new User Activity Reporting
            $this->reporting($user->id, "Profile", 'informational', \Illuminate\Support\Facades\Route::currentRouteAction() ?? '', $user->name . ' Account created successfully');
        });
        return $user;
    }

    /**
     * Handle Creation of New User for the Application
     *
     * @param  string $username
     * 
     * @return int
     */
    protected function getSponsorID(string $username)
    {
        return User::where('username', $username)->value('id')->first();
    }
}
