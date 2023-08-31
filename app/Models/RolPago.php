<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class RolPago
 * 
 * @property int $idrol_pagos
 * @property int|null $anio
 * @property string|null $mes
 * @property string|null $quincena
 * @property Carbon|null $fecha_elaboracion
 * 
 * @property Collection|DetalleRol[] $detalle_rols
 *
 * @package App\Models
 */
class RolPago extends Model
{
	protected $table = 'rol_pagos';
	protected $primaryKey = 'idrol_pagos';
	public $timestamps = false;

	protected $casts = [
		'anio' => 'int',
		'fecha_elaboracion' => 'datetime'
	];

	protected $fillable = [
		'anio',
		'mes',
		'quincena',
		'fecha_elaboracion'
	];

	public function detalle_rols()
	{
		return $this->hasMany(DetalleRol::class, 'rol_pagos_idrol_pagos');
	}
}
