<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('photos', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();

            $table->integer('activity_id')->unsigned();
            $table->foreign('activity_id')
                ->references('id')->on('activities');

            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')
                ->references('id')->on('users');

            $table->string('path');
            $table->integer('like')->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('photos');
    }
}
