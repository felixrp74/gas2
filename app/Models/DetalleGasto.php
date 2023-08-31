<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class DetalleGasto
 * 
 * @property int $iddetalle_gastos
 * @property int $cabecera_gastos_idcabecera_gastos
 * @property int $gas_idgas
 * @property float|null $cantidad
 * @property float|null $precio_subtotal
 * @property Carbon|null $fecha_venta
 * 
 * @property CabeceraGasto $cabecera_gasto
 * @property Ga $ga
 *
 * @package App\Models
 */
class DetalleGasto extends Model
{
	protected $table = 'detalle_gastos';
	protected $primaryKey = 'iddetalle_gastos';
	public $timestamps = false;

	protected $casts = [
		'cabecera_gastos_idcabecera_gastos' => 'int',
		'gas_idgas' => 'int',
		'cantidad' => 'float',
		'precio_subtotal' => 'float',
		'fecha_venta' => 'datetime'
	];

	protected $fillable = [
		'cantidad',
		'precio_subtotal',
		'fecha_venta'
	];

	public function cabecera_gasto()
	{
		return $this->belongsTo(CabeceraGasto::class, 'cabecera_gastos_idcabecera_gastos');
	}

	public function ga()
	{
		return $this->belongsTo(Ga::class, 'gas_idgas');
	}
}
