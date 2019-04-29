<?php

use Illuminate\Database\Seeder;

class BrandsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('brands')->insert([
            'id' => 101,
            'name' => 'Google',
            'slug' => 'google',
            'description' => 'Google is big',
        ]);
    }
}
