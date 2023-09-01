<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Empleado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TrabajadorController extends Controller
{
    //
    public function index()
    {

        $datos['empleados'] = DB::select( "SELECT em.*, se.nombre AS nombre_sede, p.nombre AS nombre_puesto
        FROM empleado AS em
        INNER JOIN sede AS se
        ON em.sede_idsede = se.idsede
        INNER JOIN puesto AS p
        ON em.puesto_idpuesto = p.idpuesto");


        return view('empleado.index', $datos);
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
