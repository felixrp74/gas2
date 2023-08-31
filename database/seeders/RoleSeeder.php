<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //  
        $role1 = Role::create(['name' => 'Admin']);
        $role2 = Role::create(['name' => 'ChoferUsuario']);
        $role3 = Role::create(['name' => 'DocenteUsuario']);
        $role4 = Role::create(['name' => 'MOTORIZADO']);
        $role5 = Role::create(['name' => 'ESPECIALISTA_EN_TESORERIA']);
        $role6 = Role::create(['name' => 'ESPECIALISTA_EN_CONTABILIDAD']);
        $role7 = Role::create(['name' => 'ESPECIALISTA_EN_LOGISITICA']);
        $role8 = Role::create(['name' => 'ATENCION_AL_CLIENTE']);

        Permission::create(['name' => 'admin.home'])->syncRoles([$role1, $role2]);
        
        Permission::create(['name' => 'admin.users.index'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.users.create'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.users.update'])->syncRoles([$role1]);

        /*PERMISOS DE PRUEBA*/
        Permission::create(['name' => 'admin.motorizado.index'])->syncRoles([$role4]);
        Permission::create(['name' => 'admin.motorizado.create'])->syncRoles([$role4]);
        Permission::create(['name' => 'admin.motorizado.edit'])->syncRoles([$role4]);
        Permission::create(['name' => 'admin.motorizado.destroy'])->syncRoles([$role4]);

        Permission::create(['name' => 'admin.tesoreria.index'])->syncRoles([$role4]);
        Permission::create(['name' => 'admin.tesoreria.create'])->syncRoles([$role4]);
        Permission::create(['name' => 'admin.tesoreria.edit'])->syncRoles([$role4]);
        Permission::create(['name' => 'admin.tesoreria.destroy'])->syncRoles([$role4]);
        /*PERMISOS DE PRUEBA*/
        
        Permission::create(['name' => 'admin.venta.index'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.venta.create'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.venta.edit'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.venta.destroy'])->syncRoles([$role1]);

        Permission::create(['name' => 'admin.matricula.index'])->syncRoles([$role1]); // ver matricula desde el punto de vista del estudiante opcion1
        Permission::create(['name' => 'admin.matricula.create'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.matricula.edit'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.matricula.destroy'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.matricula.show'])->syncRoles([$role1]); // ver matricula desde el punto de vista del estudiante opcion2

        Permission::create(['name' => 'admin.reportenotas.index'])->syncRoles([$role1, $role2]); // ver libreta de notas desde el punot de vista del estudiante opcion1
        Permission::create(['name' => 'admin.reportenotas.create'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.reportenotas.edit'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.reportenotas.destroy'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.reportenotas.show'])->syncRoles([$role1, $role2]); // ver libreta de notas desde el punot de vista del estudiante opcion2

        Permission::create(['name' => 'admin.asignacion.index'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.asignacion.create'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.asignacion.edit'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.asignacion.destroy'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.asignacion.show'])->syncRoles([$role1, $role3]); // ver asignacion desde el punto de vista del docente

        Permission::create(['name' => 'admin.curso.index'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.curso.create'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.curso.edit'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.curso.destroy'])->syncRoles([$role1]);

        Permission::create(['name' => 'admin.colocacionnotas.index'])->syncRoles([$role1, $role3]); // colocar notas desde el punto de vista del docente opcion1
        Permission::create(['name' => 'admin.colocacionnotas.create'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.colocacionnotas.edit'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.colocacionnotas.destroy'])->syncRoles([$role1]);
 
        Permission::create(['name' => 'admin.fichamatricula.index'])->syncRoles([$role1, $role2]); // colocar notas desde el punto de vista del docente opcion1
        Permission::create(['name' => 'admin.fichamatricula.create'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.fichamatricula.edit'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.fichamatricula.destroy'])->syncRoles([$role1]);

        Permission::create(['name' => 'admin.apoderado.index'])->syncRoles([$role1]); // colocar notas desde el punto de vista del docente opcion1
        Permission::create(['name' => 'admin.apoderado.create'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.apoderado.edit'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.apoderado.destroy'])->syncRoles([$role1]);
 

    }
}
