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
            'updated_at' => now(),
            'created_at' => now(),
        ]);

        DB::table('brands')->insert([
            'id' => 201,
            'name' => 'Samsung',
            'slug' => 'samsung',
            'description' => 'Samsung is big',
            'updated_at' => now(),
            'created_at' => now(),
        ]);

        DB::table('brands')->insert([
            'id' => 301,
            'name' => 'AKG',
            'slug' => 'akg',
            'description' => 'AKG is big',
            'updated_at' => now(),
            'created_at' => now(),
        ]);
    }
}
