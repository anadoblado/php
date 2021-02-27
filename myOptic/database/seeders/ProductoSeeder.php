<?php

namespace Database\Seeders;

use App\Models\Producto;
use Illuminate\Database\Seeder;

class ProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //DB::table('productos')->delete();

        $p = new Producto();
        $p->Ref='1234F';
        $p->color='rojo';
        $p->precio='70';
        $p->save();

        $p = new Producto();
        $p->Ref='2234F';
        $p->color='negro';
        $p->precio='90';
        $p->save();

        $p = new Producto();
        $p->Ref='3234F';
        $p->color='blanco y negro';
        $p->precio='87';
        $p->save();

        $p = new Producto();
        $p->Ref='4234F';
        $p->color='azul';
        $p->precio='90';
        $p->save();

        $p = new Producto();
        $p->Ref='5234F';
        $p->color='bieg';
        $p->precio='70';
        $p->save();
    }
}
