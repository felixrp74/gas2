<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Ga
 * 
 * @property int $idgas
 * @property string|null $descripcion
 * @property int|null $peso
 * @property string|null $tipo
 * @property float|null $precio
 * @property int|null $cantidad
 * @property string|null $marca
 * @property int|null $cantidad_vacios
 * @property int $proveedor_idproveedor
 * @property int $sede_idsede
 * @property int $cliente_idcliente
 * 
 * @property Cliente $cliente
 * @property Proveedor $proveedor
 * @property Sede $sede
 * @property Collection|DetalleGasto[] $detalle_gastos
 * @property DetalleIngreso $detalle_ingreso
 *
 * @package App\Models
 */
class Ga extends Model
{
	protected $table = 'gas';
	protected $primaryKey = 'idgas';
	public $timestamps = false;

	protected $casts = [
		'peso' => 'int',
		'precio' => 'float',
		'cantidad' => 'int',
		'cantidad_vacios' => 'int',
		'proveedor_idproveedor' => 'int',
		'sede_idsede' => 'int',
		'cliente_idcliente' => 'int'
	];

	protected $fillable = [
		'descripcion',
		'peso',
		'tipo',
		'precio',
		'cantidad',
		'marca',
		'cantidad_vacios'
	];

	public function cliente()
	{
		return $this->belongsTo(Cliente::class, 'cliente_idcliente');
	}

	public function proveedor()
	{
		return $this->belongsTo(Proveedor::class, 'proveedor_idproveedor');
	}

	public function sede()
	{
		return $this->belongsTo(Sede::class, 'sede_idsede');
	}

	public function detalle_gastos()
	{
		return $this->hasMany(DetalleGasto::class, 'gas_idgas');
	}

	public function detalle_ingreso()
	{
		return $this->hasOne(DetalleIngreso::class, 'gas_idgas');
	}
}
