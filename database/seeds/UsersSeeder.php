<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\User::create([
            "name" => "Administrador",
            'phone' => '3001595147',
            'occupation' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('123456'),
            'role_id' => 1
        ]);

        App\User::create([
            "name" => "Tecnico1",
            'phone' => '3001595147',
            'occupation' => 'Tecnico sistemas',
            'email' => 'tec@aempresa.com',
            'password' => bcrypt('123456'),
            'role_id' => 2
        ]);

        App\User::create([
            "name" => "Cliente1",
            'phone' => '3001595147',
            'occupation' => 'Programador',
            'email' => 'cliente@aempresa.com',
            'password' => bcrypt('123456'),
            'role_id' => 3
        ]);
    }
}
