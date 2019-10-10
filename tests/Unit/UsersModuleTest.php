<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Profession;
use App\Company;

class UsersModuleTest extends TestCase
{
    /**
     * Ejecuta automaticamente las migraciones de la base dedatos de prueba
     * Ejecuta las pruebas en una "transaccion de la bd" lo que significa que puede
     * revertir la operacion al terminarcada prueba
     */
    use RefreshDatabase;

    /**
     * A basic test example.
     *
     * @return void
     */

    public function testExample()
    {
        App\User::create([
            "name" => "Administrador",
            'phone' => '3001595147',
            'occupation' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('123456'),
            'role_id' => 1
        ]);

        //Simulando peticion get
        $this->get('/usuarios')
             ->assertStatus(200) // si existe la ruta
             ->assertSee('Usuarios') // se puede ver el texto usuarios
             ->assertSee('Juan');
    }

    public function testExampleEmpty()
    {
        //Simulando peticion get
        $this->get('/usuarios')
             ->assertStatus(200) // si existe la ruta
             ->assertSee('Noy Hay registros Aún'); // se puede ver el texto usuarios
    }

    public function test_it_displays_the_user_details()
    {

        App\User::create([
            "name" => "Mariana Pombo",
            'phone' => '3001595147',
            'occupation' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('123456'),
            'role_id' => 1
        ]);

        //simulando peticion get
        $this->get('/usuarios/'.$user->id)
             ->assertStatus(200) // se espera 200 de normalidad en la ruta
             ->assertSee('Mariana');
    }

}
