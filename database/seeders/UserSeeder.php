<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
use Illuminate\Support\Str;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'id'=>1,
            'nombre'=>'admin',
            'cedula'=>'12345678901',
            'celular'=>'1234567890',
            'id_ciudad'=>1,
            'fecha_nacimiento'=>'1980-01-01',
            'nombre'=>'admin',
            'id_role'=>1,
            'email'=>'admin@gmail.com',
            'password' => bcrypt('password'), // password
            'remember_token' => Str::random(10)
        ]);

        User::factory(50)->create();
    }
}
