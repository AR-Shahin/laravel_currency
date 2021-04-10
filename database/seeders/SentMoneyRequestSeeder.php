<?php

namespace Database\Seeders;

use App\Models\MoneyRequest;
use Illuminate\Database\Seeder;

class SentMoneyRequestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 100; $i++) {
            $money = new MoneyRequest();
            $money->user_id = rand(1,10);
            $money->auth_id = rand(1,10);
            $money->amount =rand(100, 1000);
            $money->save();
        }
    }
}
