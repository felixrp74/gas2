<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */ 
    public function run()
    {
        User::create([
            'name'=> 'edwin',
            'email'=> 'edwin@edwin.com',
            'tipo_usuario'=> 'admin',
            'password'=> bcrypt('edwin@edwin.com'),
        ])->assignRole('Admin'); // 'Admin' de la linea 20 de archivo 'RoleSeeder.php'

        User::create([
            'name'=> 'chofer',
            'email'=> 'chofer@gmail.com',
            'tipo_usuario'=> 'chofer',
            'identificador_chofer_moto'=> 1,
            'password'=> bcrypt('chofer@gmail.com'),
        ])->assignRole('ChoferUsuario'); // 'ChoferUsuario' de la linea 20 de archivo 'RoleSeeder.php'

        User::create([
            'name'=> 'Estudiante2',
            'email'=> 'estudiante2@gmail.com',
            'tipo_usuario'=> 'estudiante',
            'identificador_chofer_moto'=> 2,
            'password'=> bcrypt('estudiante2@gmail.com'),
        ])->assignRole('ChoferUsuario'); // 'EstudianteUsuario' de la linea 20 de archivo 'RoleSeeder.php'

        User::create([
            'name'=> 'Docente',
            'email'=> 'docente@gmail.com',
            'tipo_usuario'=> 'docente',
            'identificador_secretaria'=> 2,
            'password'=> bcrypt('docente@gmail.com'),
        ])->assignRole('DocenteUsuario'); // 'DocenteUsuario' de la linea 20 de archivo 'RoleSeeder.php'

        User::create([
            'name'=> 'Docente2',
            'email'=> 'docente2@gmail.com',
            'tipo_usuario'=> 'docente',
            'identificador_secretaria'=> 3,
            'password'=> bcrypt('docente2@gmail.com'),
        ])->assignRole('DocenteUsuario'); // 'DocenteUsuario' de la linea 20 de archivo 'RoleSeeder.php'

        // User::factory(2)->create(); // de la linea 21 'RoleSeeder.php'
    }
}
