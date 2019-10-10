<?php

use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Role::create([
            "name" => "Administrador"
        ]);

        App\Role::create([
            "name" => "Tecnico"
        ]);

        App\Role::create([
            "name" => "Cliente"
        ]);
    }
}
