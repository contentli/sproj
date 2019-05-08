<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('slug')->unique();
            $table->text('blurb')->nullable();
            $table->text('description')->nullable();

            // Price info
            $table->string('price')->nullable();

            // @todo Move rating into it's own thing
            $table->integer('rating')->nullable();
            $table->integer('rating_count')->nullable();

            $table->string('meta_description')->nullable();

            $table->integer('brand_id')->nullable();
            $table->integer('category_id');

            $table->json('specs')->nullable();
            $table->json('links')->nullable();
            $table->json('options')->nullable();

            $table->boolean('is_temporary')->default(false);

            $table->timestamp('published_at')->nullable();
            $table->softDeletes();
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
