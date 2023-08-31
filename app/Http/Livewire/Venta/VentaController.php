<?php

namespace App\Http\Livewire\Venta;

use App\Models\CabeceraFactura;
use App\Models\CabeceraIngresos;
use App\Models\Cliente;
use App\Models\ClienteDireccion;
use App\Models\DetalleFactura;
use App\Models\Ga;
use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VentaController extends Component
{
    public function index()
    {
        $datos['ventas'] = CabeceraFactura::all();
        return view('livewire.venta.venta-index', $datos);
    }

    public function render()
    { 
        
        $datos['ventas'] = CabeceraFactura::all();
        return view('livewire.venta.venta-index', $datos);
    }

    public function create(){
        return view('livewire.venta.venta-create');
    }
    public function store(Request $request){
        $datos_venta = request()->except('_token');
        // var_dump( $datos_venta);

        $serie = "001";
        $celular = "051351212";
        $ruc = "20542605716";
        $direccion = "Jr. Justo Riquelme N° 270 urbanización Chanu Chanu";
        
        DB::beginTransaction();
        try{
            
            $cliente = Cliente::create([
                "nombre" => $datos_venta["nombre"],
                "apellido_paterno" => $datos_venta["apellido_paterno"],
                "apellido_materno" => $datos_venta["apellido_materno"],
                "dni" => $datos_venta["dni"],
                "ruc" => $datos_venta["ruc"]
            ]);

            $cliente_direccion = ClienteDireccion::create([
                "direccion" => $datos_venta["direccion_actual"],
                "barrio" => $datos_venta["barrio"],
                "referencia" => $datos_venta["referencia"],
                "manzana" => $datos_venta["manzana"],
                "lote" => $datos_venta["lote"],
                "cliente_idcliente" => $cliente->idcliente
            ]);

            $cabecera_ingresos = CabeceraIngresos::create([
                "serie" => $serie,
                "celular" => $celular,
                "ruc" => $ruc,
                "direccion" => $direccion,
                "cliente_direccion_idcliente_direccion" => $cliente_direccion->idcliente_direccion
            ]);


            $tipo = $datos_venta["tipo"];
            $marca = $datos_venta["marca"];
            $peso = $datos_venta["peso"];
            $cantidad = $datos_venta["cantidad"];
 
            $gas = Ga::where("tipo", "=", $tipo)
            ->where("marca", "=", $marca)
            ->where("peso", "=", $peso)
            ->get()
            ->first()
            ;

            DetalleFactura::create([
                "cabecera_ingresos_idcabecera_ingresos" => $cabecera_ingresos->idcabecera_ingresos,
                "gas_idgas" => $gas->idgas,
                "cantidad" =>  $cantidad,
                "precio" => $gas->precio
            ]);


            DB::commit();
            return $this->render();
            
        }catch(\Exception $e){
            DB::rollback();
            $error['yerro'] = $e;
            return view('livewire.venta.venta-create', $error);
            // return "Exception".$e;
        }
 
    }
}
