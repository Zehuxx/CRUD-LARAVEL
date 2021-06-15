<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('id_role')->default(0)->index('FK_users_roles');
            $table->string('nombre', 100)->default('0');
            $table->string('celular', 10)->nullable()->default('0');
            $table->string('email', 100)->default('0')->unique('Index 2');
            $table->string('password')->default('0');
            $table->string('cedula', 11)->default('0')->unique('Index 3');
            $table->date('fecha_nacimiento');
            $table->integer('id_ciudad')->default(0)->index('FK_users_cities');
            $table->rememberToken()->default('0');
            $table->timestamp('email_verified_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
