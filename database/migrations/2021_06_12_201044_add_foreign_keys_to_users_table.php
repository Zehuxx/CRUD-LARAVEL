<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->foreign('id_ciudad', 'FK_users_cities')->references('id')->on('cities')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign('id_role', 'FK_users_roles')->references('id')->on('roles')->onUpdate('RESTRICT')->onDelete('RESTRICT');
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
            $table->dropForeign('FK_users_cities');
            $table->dropForeign('FK_users_roles');
        });
    }
}
