<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $names = ['Shahin', 'Omi', 'Himel', 'Tamanna', 'Asik', 'Tanzim', 'Bappy', 'Samira'];
        for ($i = 0; $i < count($names); $i++) {
            $user = new User();
            $user->name = $names[$i];
            $user->email = $names[$i] . '@gmail.com';
            $user->password = 123;
            $user->token = '';
            $user->is_verified = 1;
            $user->status = 1;
            $user->role = $i % 2 == 0 ? 'merchant' : 'user';
            $user->save();
        }
    }
}
