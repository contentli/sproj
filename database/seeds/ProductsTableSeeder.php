<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            'id' => 101,
            'name' => 'Google Chromecast (3rd Generation)',
            'slug' => 'google-chromecast-3',
            'description' => 'All together now: Watch movies, shows, live TV, YouTube, and photos streaming on your TV from all your family’s devices',
            'brand_id' => 101,
            'category_id' => 102,
            'updated_at' => now(),
            'published_at' => now(),
        ]);

        factory(App\Product::class, 500)->create();
    }
}
