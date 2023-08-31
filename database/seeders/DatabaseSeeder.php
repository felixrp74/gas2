<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    { 
        Storage::deleteDirectory('files'); // para eliminar la carpeta
        Storage::makeDirectory('files');
 
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
         
    }
}
