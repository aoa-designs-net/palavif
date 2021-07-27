<?php

namespace Database\Seeders;

use App\Http\Controllers\Auth\Traits\CreateUser;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    use CreateUser;
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
            'date_of_birth' => now()->subYears('35'),
            'userPhoneNumber' => '2348164635301',
            'location'  => 'Nigeria',
            'gender-select' => 'Male',
            'password' => 'zxcvbnma',
            'your_username' => 'Developer',
            'email_address' => 'dev@account.com',
            'type' => \App\Models\User::TYPE['admin'],
        ];
        $this->createUser($valid);

    }
}
