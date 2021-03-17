<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\User;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $user = User::create([
            'name' => 'Daniel',
            'email' => 'correo@correo.com',
            'password' => Hash::make('123456789'),
            'url' => 'http://pagina.com',
        ]);



        $user2 = User::create([
            'name' => 'Abner',
            'email' => 'correo2@correo.com',
            'password' => Hash::make('123456789'),
            'url' => 'http://pagina.com',
        ]);





    }
}
