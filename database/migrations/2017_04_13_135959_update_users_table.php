<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('forename');
            $table->string('avatar');
            $table->integer('status_id')->unsigned();
            $table->foreign('status_id')
                ->references('id')->on('status');
            $table->integer('role_id')->unsigned();
            $table->foreign('role_id')
                ->references('id')->on('roles');
            $table->integer('association_id')->unsigned();
            $table->foreign('association_id')
                ->references('id')->on('associations');
            $table->dateTime('birthday');
            $table->boolean('is_valid');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['status_id']);
            $table->dropForeign(['roles_id']);
            $table->dropForeign(['associations_id']);
            $table->dropColumn(['forename', 'avatar', 'birthday', 'is_valid']);
        });
    }
}
