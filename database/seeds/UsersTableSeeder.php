<?php

use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Magnus Vike',
            'email' => 'magnus@vike.se',
            'email_verified_at' => now(),
            'password' => Hash::make('secret'),
        ]);
    }
}
