<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Empleado;
use App\Models\Sede;
use App\Models\Proveedor;
use App\Models\Ga;

class HomeController extends Controller
{
    public function index(){

        $proveedores = Proveedor::all();
        $balones_gas = Ga::all();
        $empleados = Empleado::all();
        $sedes = Sede::all();
        
        return view('admin.index', compact('proveedores', 'balones_gas', 'empleados', 'sedes'));
    }
    
}