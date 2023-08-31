<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class DetalleIngreso
 * 
 * @property int $iddetalle_ingresos
 * @property int $cabecera_ingresos_idcabecera_ingresos
 * @property int $gas_idgas
 * @property float|null $cantidad
 * @property float|null $precio_subtotal
 * @property Carbon|null $fecha_venta
 * 
 * @property CabeceraIngreso $cabecera_ingreso
 * @property Ga $ga
 *
 * @package App\Models
 */
class DetalleIngreso extends Model
{
	protected $table = 'detalle_ingresos';
	protected $primaryKey = 'iddetalle_ingresos';
	public $timestamps = false;

	protected $casts = [
		'cabecera_ingresos_idcabecera_ingresos' => 'int',
		'gas_idgas' => 'int',
		'cantidad' => 'float',
		'precio_subtotal' => 'float',
		'fecha_venta' => 'datetime'
	];

	protected $fillable = [
		'cabecera_ingresos_idcabecera_ingresos',
		'gas_idgas',
		'cantidad',
		'precio_subtotal',
		'fecha_venta'

	];

	public function cabecera_ingreso()
	{
		return $this->belongsTo(CabeceraIngreso::class, 'cabecera_ingresos_idcabecera_ingresos');
	}

	public function ga()
	{
		return $this->belongsTo(Ga::class, 'gas_idgas');
	}
}
