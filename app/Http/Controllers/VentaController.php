<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\CabeceraIngreso;
use App\Models\DetalleIngreso;
use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\ClienteDireccion;
use App\Models\Ga;
use Illuminate\Support\Facades\DB;

class VentaController extends Controller
{
    //
    public function index()
    {
        $datos['reporteventas']  = DB::select("SELECT *, c.nombre AS nombre_cliente,
        sed.nombre AS nombre_sede, sed.direccion AS direccion_sede, sed.telefono AS telefono_sede
        FROM detalle_ingresos AS di
        INNER JOIN gas AS ga
        ON ga.idgas = di.gas_idgas
        INNER JOIN cabecera_ingresos AS ci
        ON ci.idcabecera_ingresos = di.cabecera_ingresos_idcabecera_ingresos
        INNER JOIN cliente_direccion AS cd
        ON cd.idcliente_direccion = ci.cliente_direccion_idcliente_direccion
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

    public function create()
    { 
        return view('venta.create');
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
                "direccion" => $datos_venta["direccion"],
                "barrio" => $datos_venta["barrio"],
                "referencia" => $datos_venta["referencia"],
                "manzana" => $datos_venta["manzana"],
                "lote" => $datos_venta["lote"],
                "cliente_idcliente" => $cliente->idcliente
            ]);

             
            $cabecera_ingresos = CabeceraIngreso::create([
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

            // var_dump($cabecera_ingresos->idcabecera_ingresos);

            DetalleIngreso::create([
                "cabecera_ingresos_idcabecera_ingresos" => $cabecera_ingresos->idcabecera_ingresos,
                "gas_idgas" => $gas->idgas,
                "cantidad" =>  $cantidad,
                "precio" => $gas->precio,
                "precio_subtotal" => $datos_venta["total"]
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

    public function edit($id)
    { 
        $datos['reporteingresos']  = DB::table('gas')
        ->join('detalle_ingresos', 'detalle_ingresos.gas_idgas', '=', 'gas.idgas')
        ->join('cabecera_ingresos', 'cabecera_ingresos.idcabecera_ingresos', '=', 'cabecera_ingresos_idcabecera_ingresos')
        ->join('cliente_direccion', 'cliente_direccion.idcliente_direccion', '=', 'cabecera_ingresos.cliente_direccion_idcliente_direccion')
        ->join('cliente', 'cliente.idcliente', '=', 'cliente_direccion.cliente_idcliente')
            ->select('gas.*','detalle_ingresos.*','cabecera_ingresos.*','cliente_direccion.*', 'cliente.*')
            ->where('cabecera_ingresos.idcabecera_ingresos', '=', $id)
            ->get();

        // var_dump($datos);
        // return;
        return view('venta.edit', $datos);
        
    }

    public function update(Request $request, $id)
    {
        $datosForm = request()->except('_token', '_method');
        // var_dump($id);
        // var_dump($datosForm["dni"]);
        // var_dump($datosForm["apellido_paterno"]);
        // var_dump($datosForm["apellido_materno"]);
        // var_dump($datosForm["dni"]);
        // var_dump($datosForm["direccion"]);

        $cabecera_ingresos = CabeceraIngreso::where("idcabecera_ingresos", "=", $id)->first();

        $cliente_direccion = ClienteDireccion::updateOrCreate(
            ['idcliente_direccion' => $cabecera_ingresos->cliente_direccion_idcliente_direccion],
            [ 
                'direccion' => $datosForm["direccion"],
                'barrio' => $datosForm["barrio"],
                'referencia' => $datosForm["referencia"],
                'manzana' => $datosForm["manzana"],
                'lote' => $datosForm["lote"]
            ]
        );
        
        $cliente = Cliente::updateOrCreate(
            ['idcliente' => $cliente_direccion->cliente_idcliente],
            [
                'nombre' => $datosForm["nombre"] ,
                'apellido_paterno' => $datosForm["apellido_paterno"],
                'apellido_materno' => $datosForm["apellido_materno"],
                'dni' => $datosForm["dni"],
                'ruc' => $datosForm["ruc"]
            ]
        );  
        
        $tipo = $datosForm["tipo"];
        $marca = $datosForm["marca"];
        $peso = $datosForm["peso"];
        $cantidad = $datosForm["cantidad"];

        $gas = Ga::where("tipo", "=", $tipo)
        ->where("marca", "=", $marca)
        ->where("peso", "=", $peso)
        ->get()
        ->first()
        ;
 
        
        $cliente = DetalleIngreso::updateOrCreate(
            ['cabecera_ingresos_idcabecera_ingresos' => $id],
            [
                'gas_idgas' => $gas->idgas ,
                'cantidad' => $cantidad ,
                'precio' => $datosForm["precio"]
            ]
        );

        return $this->edit($id);
 
    }


    public function destroy($id){
        DB::table('cabecera_ingresos')->where('idcabecera_ingresos', $id)->delete();
       
        return $this->index(); 
    }
}
