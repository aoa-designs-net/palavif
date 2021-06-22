<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $valid = [
            'first-name' => 'Adeolu',
            'last-name'     => 'Osunsami',
            'date_of_birth' => now()->subtract('18'),
            'userPhoneNumber' => '2348164635301',
            'location'  => 'Nigeria',
            'gender-select' => 'Male',
            'password' => 'zxcvbnma',
            'your-username' => 'Developer',
            'email_address' => 'dev@account.com',
        ];
        $user = \App\Models\User::create([
            'name' => $valid['first-name'] . " " . $valid['last-name'],
            'email' => $valid['email_address'],
            'username' => $valid['your-username'],
            'phone_number' => $valid['userPhoneNumber'],
            'password' => Hash::make($valid['password']),
        ]);
        // Register User Account details
        $user->account()->create([
            'first_name'            => $valid['first-name'],
            'last_name'             => $valid['last-name'],
            'date_of_birth'         => $valid['date_of_birth'],
            'phone_number'          => $valid['userPhoneNumber'],
            'phone_country'         => $valid['location'],
            'location'              => $valid['location'],
            'sponser_username'      => $valid['sponsor-username'] ?? Null,
            'gender'                => $valid['gender-select'],
            'referral_link'         => env('APP_URL', url()->current()) . '/register?referral=' . $user->username,
        ]);
    }
}
