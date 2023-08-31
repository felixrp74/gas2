<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\DetalleRol;
use App\Models\Empleado;
use App\Models\Puesto;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PagoTrabajadoresController extends Controller
{
    
    public function index()
    { 

        $datos['reportepagotrabajadores'] = DB::select("SELECT em.idempleado, pu.nombre AS cargo, em.nombre, em.apellido_paterno, 
        em.apellido_materno, em.dias_asistidos, pu.sueldo_fijo,
        dr.*, rp.*
        FROM empleado AS em
        INNER JOIN puesto AS pu
        ON em.puesto_idpuesto = pu.idpuesto 
        INNER JOIN detalle_rol AS dr
        ON dr.empleado_idempleado = em.idempleado
        INNER JOIN rol_pagos AS rp
        ON rp.idrol_pagos = dr.rol_pagos_idrol_pagos");

        return view('reportepagotrabajadores.index', $datos);
    }

    public function show($id)
    {
        $datos['reportepagotrabajador'] = DB::select("SELECT em.idempleado, pu.nombre AS cargo, em.nombre, em.apellido_paterno, 
        em.apellido_materno, em.dias_asistidos, pu.sueldo_fijo,
        dr.*, rp.*
        FROM empleado AS em
        INNER JOIN puesto AS pu
        ON em.puesto_idpuesto = pu.idpuesto 
        INNER JOIN detalle_rol AS dr
        ON dr.empleado_idempleado = em.idempleado
        INNER JOIN rol_pagos AS rp
        ON rp.idrol_pagos = dr.rol_pagos_idrol_pagos
        WHERE em.idempleado = $id");

        return view('reportepagotrabajadores.detalle', $datos);
    }

    // NUEVO TRABAJADOR
    public function create()
    { 
        
        $roles = Role::all();
        // dd($roles);        
        // return view('admin.users.create', compact('roles'));
        return view('reportepagotrabajadores.create', compact('roles'));
    }

    // NUEVO TRABAJADOR
    public function store(Request $request){
        $datos_trabajador = request()->except('_token');
        // var_dump( $datos_trabajador );
        // return;
 
        
        DB::beginTransaction();

        try{

            $puesto = Puesto::where('idpuesto', $datos_trabajador["puesto_idpuesto"]);
            
            $empleado = Empleado::create([ 
                'DNI' =>  $datos_trabajador["dni"],
                'nombre' =>  $datos_trabajador["nombre"],
                'apellido_paterno' =>  $datos_trabajador["apellido_paterno"],
                'apellido_materno' =>  $datos_trabajador["apellido_materno"],
                'direccion' =>  $datos_trabajador["direccion"],
                'celular' =>  $datos_trabajador["celular"],
                'email' =>  $datos_trabajador["email"],
                'dias_asistidos' =>  $datos_trabajador["dias_asistidos"],
                'puesto_idpuesto' =>  $datos_trabajador["puesto_idpuesto"],
                'sede_idsede' =>  $datos_trabajador["sede_idsede"]
            ]);

            //CREAR USUARIO 

            User::create([
                'dni' => $datos_trabajador["dni"],
                'name' => $datos_trabajador["nombre"],
                'apellido_paterno' => $datos_trabajador["apellido_paterno"],
                'apellido_materno' => $datos_trabajador["apellido_materno"],
                'celular' => $datos_trabajador["celular"],
                'email' => $datos_trabajador["email"],
                'password' => $datos_trabajador["password"],
                // 'two_factor_secret' => $datos_trabajador["oo"],
                // 'two_factor_recovery_codes' => $datos_trabajador["oo"],
                'usuario' => $datos_trabajador["nombre"],
                'tipo' => $datos_trabajador["oo"],
                // 'email_verified_at' => $datos_trabajador["oo"],
                'tipo_usuario' => $datos_trabajador["oo"],
                'identificador_secretaria' => $datos_trabajador["oo"],
                'identificador_supervisor_logistica' => $datos_trabajador["oo"],
                'identificador_gerente' => $datos_trabajador["oo"],
                'identificador_contador' => $datos_trabajador["oo"],
                'identificador_chofer_moto' => $datos_trabajador["oo"],
                'identificador_chofer_trailer' => $datos_trabajador["oo"],
                // 'remember_token' => $datos_trabajador["oo"],
                // 'current_team_id' => $datos_trabajador["oo"],
                // 'profile_photo_path' => $datos_trabajador["oo"]

            ]);

            
            
            $detalle_rol =  DetalleRol::create([
                'remuneracion' =>  $puesto->sueldo_fijo,
                'horas_extra' =>  0,
                'utilidades' =>  0,
                'aporte_seguro' =>  0,
                'fondos_reservas' =>  0,
                'vacaciones' =>  0,
                'sueldo_total' =>  $puesto->sueldo_fijo,
                'empleado_idempleado' =>  $datos_trabajador["sede_idsede"],
                'rol_pagos_idrol_pagos' =>  6 //junio
            ]);

            //USUARIO POR CREAR PARA LA TABLA USERS 
            //USUARIO DEBE ACCEDER A DETERMINADOS NUMERO DE MODULOS
        

             
            DB::commit();
            return $this->index();
            
        }catch(\Exception $e){
            DB::rollback();
            // $error['yerro'] = $e;
            // return view('livewire.venta.venta-create', $error);
            return "Exception".$e;
        }
 
    }

    //
    public function reporte_pago_trabajador_mes($id, $mes)
    {
        $datos['reportepagotrabajador'] = DB::select("SELECT em.idempleado, pu.nombre AS cargo, em.nombre, em.apellido_paterno, 
        em.apellido_materno, em.dias_asistidos, pu.sueldo_fijo,
        dr.*, rp.*
        FROM empleado AS em
        INNER JOIN puesto AS pu
        ON em.puesto_idpuesto = pu.idpuesto 
        INNER JOIN detalle_rol AS dr
        ON dr.empleado_idempleado = em.idempleado
        INNER JOIN rol_pagos AS rp
        ON rp.idrol_pagos = dr.rol_pagos_idrol_pagos
        WHERE em.idempleado = $id 
        AND rp.mes = '$mes'
        ");

        return view('reportepagotrabajadores.boleta_trabajador', $datos);
    }
}
