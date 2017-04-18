<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_products', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('name')->unique();
            $table->string('slug');
            $table->integer('quantities')->unsigned()->nullable();
            $table->text('description');
            $table->float('price');
            $table->boolean('size');
            $table->boolean('color');

            $table->integer('category_id')->unsigned();
            $table->foreign('category_id')
                ->references('id')->on('shop_categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shop_products');
    }
}
