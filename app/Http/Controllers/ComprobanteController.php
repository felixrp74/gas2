<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class ComprobanteController extends Controller
{
    
    public function index()
    {
        $id = auth()->user()->identificador_estudiante;

        $datos['reportecomprobantes']  = DB::select("SELECT se.nombre AS sede_empresa, ga.tipo, ga.peso, ga.precio, ga.marca, di.cantidad, di.precio_subtotal AS precio_venta
        FROM detalle_ingresos AS di
        INNER JOIN gas AS ga
        ON di.gas_idgas = ga.idgas
        INNER JOIN sede AS se
        ON se.idsede = ga.sede_idsede");

        // $data = $datos['reportenotas'][0];
        // var_dump($data);   

        return view('reportecomprobante.index', $datos);

    }

    public function create()
    {
        return view('matricula.create');
    }

    public function store(Request $request)
    {        
        
    }

    public function show($matriculaId)
    {
        
    }


    public function edit($id)
    {
        //
        
    }

    public function update(Request $request, $id)
    {
        
    }

    public function destroy($id)
    {
        

    }


 
}
