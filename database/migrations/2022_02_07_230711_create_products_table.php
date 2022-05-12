<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->integer('category_id');
            $table->integer('subcategory_id');
            $table->string('product_name');
            $table->integer('old_price');
            $table->integer('new_price')->nullable();
            $table->string('slug');
            $table->string('sku');
            $table->text('short_description');
            $table->longText('long_description');
            $table->string('weight')->nullable();
            $table->string('dimensions')->nullable();
            $table->string('materials')->nullable();
            $table->string('other_info')->nullable();
            $table->text('product_image')->default('product.jpg');
            $table->integer('Added_by');
            $table->tinyInteger('status')->default(1);
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
