<?php

namespace Database\Seeders;

use App\Models\Ficha;
use Illuminate\Database\Seeder;

class FichaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $f = new Ficha();
        $f->fecha='2020-01-01';
        $f->g_ojo_iz='0.5 miop';
        $f->g_ojo_der='0.5 miop';
        $f->user_id='1';
        $f->producto_id='1';
        $f->save();
    }
}
