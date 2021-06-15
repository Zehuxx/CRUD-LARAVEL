<?php
namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;
class CitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        DB::table('cities')->insert([
               'id'=>1,
               'id_estado'=>1,
               'nombre'=> "Tegucigalpa"
           ]);
        DB::table('cities')->insert([
               'id'=>2,
               'id_estado'=>2,
               'nombre'=> "Austin"
           ]);
    } 
}