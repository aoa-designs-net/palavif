<?php

namespace Database\Seeders;

use App\Models\BankList;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class BankListSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BankList::truncate();

        $banks = json_decode(File::get("database/data/paystack/banks.json"));
        foreach ($banks->data as $bank) {
            BankList::create([
                'name' => $bank->name,
                'slug' => $bank->slug,
                'code' => $bank->code
            ]);
        }
    }
}
