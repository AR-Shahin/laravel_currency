<?php

namespace Database\Seeders;

use App\Models\Balance;
use Illuminate\Database\Seeder;

class BalanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 10 ; $i++) {
            $user_id = rand(1,8);
            $user =  Balance::select('id', 'amount')->where('user_id', $user_id)->first();
                if ($user) {
                    $user->amount += rand(100,1000);
                    $user->save();
                } else {
                    Balance::create([
                        'user_id' => $user_id,
                        'amount' => rand(100, 1000)
                    ]);
                }
        }
    }
}
