<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'id' => 1,
            'name' => 'Electronics',
            'slug' => 'electronics',
            'description' => 'Home entertainment, TVs, home audio, headphones, cameras, accessories and more'
        ]);

        DB::table('categories')->insert([
            'id' => 101,
            'name' => 'Headphones',
            'slug' => 'headphones',
            'description' => 'Best sellers',
            'parent_id' => 1
        ]);

        DB::table('categories')->insert([
            'id' => 102,
            'name' => 'Television & Video',
            'slug' => 'television-video',
            'description' => 'Best sellers',
            'parent_id' => 1
        ]);

    }
}
