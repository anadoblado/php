<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();
         \App\Models\User::factory(10)->create();

         DB::table('frutas')->delete();
         DB::table('frutas')->insert([
            ['nombre'=>'manzana', 'temporada'=>1, 'pais'=>'España'],
             ['nombre'=>'naranja', 'temporada'=>1, 'pais'=>'España'],
             ['nombre'=>'melón', 'temporada'=>3, 'pais'=>'Paraguay'],
             ['nombre'=>'fresa', 'temporada'=>2, 'pais'=>'Francia'],
         ]);
    }
}
