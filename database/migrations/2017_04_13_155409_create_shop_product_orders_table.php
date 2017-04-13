<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopProductOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_product_orders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('size');
            $table->string('color');
            $table->float('price');

            $table->integer('order_id')->unsigned();
            $table->foreign('order_id')
                ->references('id')->on('shop_orders');

            $table->integer('product_id')->unsigned();
            $table->foreign('product_id')
                ->references('id')->on('shop_products');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shop_product_orders');
    }
}
