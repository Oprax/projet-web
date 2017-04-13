<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activities', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('name');
            $table->dateTime('date');
            $table->string('lieu');
            $table->boolean('is_proposal');
            $table->boolean('is_accept');
            $table->string('photo');
            $table->integer('like')->unsigned();
            $table->boolean('can_subscribe');
            $table->integer('association_id')->unsigned();
            $table->foreign('association_id')
                ->references('id')->on('associations');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('activities');
    }
}
