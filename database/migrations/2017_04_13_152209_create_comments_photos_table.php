<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsPhotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments_photos', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();

            $table->text('content');

            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')
                ->references('id')->on('users');

            $table->integer('photo_id')->unsigned();
            $table->foreign('photo_id')
                ->references('id')->on('photos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments_photos');
    }
}
