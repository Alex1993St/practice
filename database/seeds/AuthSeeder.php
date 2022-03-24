<?php

use Illuminate\Database\Seeder;
use \App\User;
use \Carbon\Carbon;
use \Illuminate\Support\Facades\Hash;


class AuthSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'alex',
            'email' => 'alex@i.ua',
            'email_verified_at' => Carbon::now()->format('Y-m-d H:m:s'),
            'password' => Hash::make('123'),
            'role_id' => 1
        ]);
    }
}
