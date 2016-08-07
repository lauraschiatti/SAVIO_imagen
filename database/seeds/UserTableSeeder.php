<?php

use Illuminate\Database\Seeder;
use App\User;

use Illuminate\Hashing\BcryptHasher;


class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $hashedPassword = (new BcryptHasher)->make(env('ADMIN_PASS')); //replace bcrypt

        User::create([
            'username' => env('ADMIN_USER'),

            'password' => $hashedPassword,
        ]);
    }
}
