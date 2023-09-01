<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PagoTrabajadorController extends Controller
{
    //
    // public function index()
    // {
    //     $datos['reportepagotrabajador'] = DB::select("SELECT em.idempleado, pu.nombre AS cargo, em.nombre, em.apellido_paterno, 
    //     em.apellido_materno, em.dias_asistidos, pu.sueldo_fijo,
    //     dr.*, rp.*
    //     FROM empleado AS em
    //     INNER JOIN puesto AS pu
    //     ON em.puesto_idpuesto = pu.idpuesto 
    //     INNER JOIN detalle_rol AS dr
    //     ON dr.empleado_idempleado = em.idempleado
    //     INNER JOIN rol_pagos AS rp
    //     ON rp.idrol_pagos = dr.rol_pagos_idrol_pagos
    //     WHERE em.idempleado = $id");

    //     return view('reportepagotrabajadores.index', $datos);
    // }

    public function show($mes)
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
        WHERE em.idempleado = $mes");

        return view('reportepagotrabajadores.detalle', $datos);
    }
}
