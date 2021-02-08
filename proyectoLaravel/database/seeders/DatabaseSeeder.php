<?php

namespace Database\Seeders;

use App\Models\Fruit;
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
       // DB::table('users')->delete();
       //  \App\Models\User::factory(10)->create();

         DB::table('frutas')->delete();
         //DB::table('frutas')->insert([
           // ['nombre'=>'manzana', 'temporada'=>1, 'pais'=>'España'],
           //  ['nombre'=>'naranja', 'temporada'=>1, 'pais'=>'España'],
           //  ['nombre'=>'melón', 'temporada'=>3, 'pais'=>'Paraguay'],
           //  ['nombre'=>'fresa', 'temporada'=>2, 'pais'=>'Francia'],
         //]);

        $f = new Fruit();
        $f->nombre="manzana";
        $f->temporada= 1;
        $f->pais = "España";
        $f->save();

        $f = new Fruit();
        $f->nombre="naranja";
        $f->temporada= 1;
        $f->pais = "España";
        $f->save();

        $f = new Fruit();
        $f->nombre="melón";
        $f->temporada= 3;
        $f->pais = "Benamejí";
        $f->save();

        $f = new Fruit();
        $f->nombre="fresa";
        $f->temporada= 2;
        $f->pais = "Francia";
        $f->save();
    }
}
