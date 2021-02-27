<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $u = new User();
        $u->name="Ana";
        $u->apells="Apellidos";
        $u->dni="12345678a";
        $u->address="calle uno";
        $u->cp="12345";
        $u->city="ciudad uno";
        $u->email="dos@uno.es";
        $u->password="1234";
        $u->role_id=1;
        $u->save();

        $u = new User();
        $u->name="Fran";
        $u->apells="Apellidos";
        $u->dni="11345678a";
        $u->address="calle uno";
        $u->cp="12345";
        $u->city="ciudad uno";
        $u->email="tres@uno.es";
        $u->password="1234";
        $u->role_id=2;
        $u->save();

        $u = new User();
        $u->name="Pepe";
        $u->apells="Apellidos";
        $u->dni="11145678a";
        $u->address="calle uno";
        $u->cp="12345";
        $u->city="ciudad uno";
        $u->email="uno@uno.es";
        $u->password="1234";
        $u->role_id=2;
        $u->save();
    }
}
