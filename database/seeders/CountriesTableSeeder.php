<?php
namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;
class CountriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        DB::table('countries')->insert([
               'id'=>1,
               'nombre'=> "Honduras"
           ]);
        DB::table('countries')->insert([
               'id'=>2,
               'nombre'=> "Estados Unidos de America"
           ]);
    } 
}