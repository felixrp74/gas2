<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReporteVentaController extends Controller
{
    //
    public function index()
    { 
        $datos['reporteventas']  = DB::select("SELECT *, c.nombre AS nombre_cliente,
        sed.nombre AS nombre_sede, sed.direccion AS direccion_sede, sed.telefono AS telefono_sede
        FROM detalle_ingresos AS df
        INNER JOIN gas AS ga
        ON ga.idgas = df.gas_idgas
        INNER JOIN cabecera_ingresos AS cf
        ON cf.idcabecera_ingresos = df.cabecera_ingresos_idcabecera_ingresos
        INNER JOIN cliente_direccion AS cd
        ON cd.idcliente_direccion = cf.cliente_direccion_idcliente_direccion
        INNER JOIN cliente AS c
        ON c.idcliente = cd.cliente_idcliente
        INNER JOIN sede AS sed 
        ON sed.idsede = ga.sede_idsede");
        
        // dump($datos);    
        return view('reporteventas.index', $datos);

    }

    public function show($id)
    {
        
        $datos['reporteventa']  = DB::select("SELECT *, cf.serie AS serie_empresa, 
        cf.celular AS celular_empresa, cf.ruc AS ruc_empresa, cf.direccion AS direccion_empresa,
        df.cantidad AS cantidad_detalle_ingresos, df.precio_subtotal AS precio_subtotal_detalle_ingresos
        FROM detalle_ingresos AS df
        INNER JOIN gas AS ga
        ON ga.idgas = df.gas_idgas
        INNER JOIN cabecera_ingresos AS cf
        ON cf.idcabecera_ingresos = df.cabecera_ingresos_idcabecera_ingresos
        INNER JOIN cliente_direccion AS cd
        ON cd.idcliente_direccion = cf.cliente_direccion_idcliente_direccion
        INNER JOIN cliente AS c
        ON c.idcliente = cd.cliente_idcliente
        WHERE cf.idcabecera_ingresos = $id 
        ");
        
        // dump($datos);    
        return view('reporteventas.boleta_venta', $datos);
    }
}
