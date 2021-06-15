<?php
namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;
class EstatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        DB::table('estates')->insert([
               'id'=>1,
               'id_pais'=>1,
               'nombre'=> "Francisco Morazan"
           ]);
        DB::table('estates')->insert([
               'id'=>2,
               'id_pais'=>2,
               'nombre'=> "Texas"
           ]);
    } 
}