<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Gas;
use App\Models\Proveedor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LogisticaController extends Controller
{
    //
    public function index()
    {
        
        $datos['balones_gas']  = DB::select("SELECT *
            FROM sede AS se
            INNER JOIN gas AS ga
            ON ga.sede_idsede = se.idsede
        ");
            
        // dump($datos);    
        // return view('logistica.index', $datos);
        // $datos['balones_gas'] = Gas::all();
        return view('logistica.index', $datos);

    }

    public function create()
    { 
        $datos['proveedores'] = Proveedor::all();
        return view('logistica.create', $datos);
    }
    public function store(Request $request){
        $datos_gas = request()->except('_token');
        // var_dump( $datos_gas);
        // return;

        DB::beginTransaction();
        try{
            var_dump(intval($datos_gas["peso"]));
            Gas::updateOrCreate([
                "descripcion" => $datos_gas["descripcion"],
                "peso" => intval($datos_gas["peso"]),
                "tipo" => $datos_gas["tipo"],
                "precio" => floatval($datos_gas["precio"]),
                "cantidad" => intval($datos_gas["cantidad"]), 
                "marca" => $datos_gas["marca"],
                "proveedor_idproveedor" => $datos_gas["proveedor"],
            ]);
 
            DB::commit();
            return $this->index();
            
        }catch(\Exception $e){
            DB::rollback();
            // $error['yerro'] = $e;
            // return view('livewire.venta.venta-create', $error);
            return "Exception".$e;
        }
 
    }

    public function edit($id){

        $gas = Gas::where("idgas", $id)->get()->first();

        $proveedor = Proveedor::where("idproveedor", $gas->proveedor_idproveedor)->get()->first();
        $proveedores = Proveedor::all();

        return view('logistica.edit', compact('gas', 'proveedor', 'proveedores'));

    }

    public function update(Request $request, $id)
    {
        $datosForm = request()->except('_token', '_method');
        // var_dump($datosForm);
        // return;

        $cliente_direccion = Gas::updateOrCreate(
            ['idgas' => $id],
            [ 
                'descripcion' => $datosForm["descripcion"],
                'peso' => $datosForm["peso"],
                'tipo' => $datosForm["tipo"],
                'precio' => $datosForm["precio"],
                'cantidad' => $datosForm["cantidad"],
                'marca' => $datosForm["marca"],
                'proveedor_idproveedor' => $datosForm["proveedor"]
            ]
        );

        return $this->edit($id);

    }

    public function destroy($id)
    {
        $gas = Gas::findOrFail($id);
        $gas::destroy($id);

        // return redirect('/balon_gas')->with('mensaje', 'gas borrado');
        return $this->index();
    }
}
