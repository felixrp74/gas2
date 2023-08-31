<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class CabeceraGasto
 * 
 * @property int $idcabecera_factura
 * @property string|null $serie
 * @property string|null $celular
 * @property string|null $ruc
 * @property string|null $direccion
 * @property int $proveedor_direccion_proveedor_idproveedor
 * 
 * @property ProveedorDireccion $proveedor_direccion
 * @property Collection|DetalleGasto[] $detalle_gastos
 *
 * @package App\Models
 */
class CabeceraGasto extends Model
{
	protected $table = 'cabecera_gastos';
	public $timestamps = false;

	protected $casts = [
		'proveedor_direccion_proveedor_idproveedor' => 'int'
	];

	protected $fillable = [
		'serie',
		'celular',
		'ruc',
		'direccion'
	];

	public function proveedor_direccion()
	{
		return $this->belongsTo(ProveedorDireccion::class, 'proveedor_direccion_proveedor_idproveedor', 'proveedor_idproveedor');
	}

	public function detalle_gastos()
	{
		return $this->hasMany(DetalleGasto::class, 'cabecera_gastos_idcabecera_gastos');
	}
}
