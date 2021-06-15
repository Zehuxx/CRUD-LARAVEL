<?php
namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        DB::table('roles')->insert([
               'id'=>1,
               'nombre'=>'admin'
           ]);
        DB::table('roles')->insert([
               'id'=>2,
               'nombre'=>'user'
           ]);
    } 
}