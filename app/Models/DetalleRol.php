<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class DetalleRol
 * 
 * @property int $iddetalle_rol
 * @property float|null $remuneracion
 * @property int|null $horas_extra
 * @property float|null $utilidades
 * @property float|null $aporte_seguro
 * @property float|null $fondos_reservas
 * @property int|null $vacaciones
 * @property float|null $sueldo_total
 * @property int $empleado_idempleado
 * @property int $rol_pagos_idrol_pagos
 * 
 * @property Empleado $empleado
 * @property RolPago $rol_pago
 *
 * @package App\Models
 */
class DetalleRol extends Model
{
	protected $table = 'detalle_rol';
	public $timestamps = false;

	protected $casts = [
		'remuneracion' => 'float',
		'horas_extra' => 'int',
		'utilidades' => 'float',
		'aporte_seguro' => 'float',
		'fondos_reservas' => 'float',
		'vacaciones' => 'int',
		'sueldo_total' => 'float',
		'empleado_idempleado' => 'int',
		'rol_pagos_idrol_pagos' => 'int'
	];

	protected $fillable = [
		'remuneracion',
		'horas_extra',
		'utilidades',
		'aporte_seguro',
		'fondos_reservas',
		'vacaciones',
		'sueldo_total',
		'empleado_idempleado',
		'rol_pagos_idrol_pagos'  
	];

	public function empleado()
	{
		return $this->belongsTo(Empleado::class, 'empleado_idempleado');
	}

	public function rol_pago()
	{
		return $this->belongsTo(RolPago::class, 'rol_pagos_idrol_pagos');
	}
}
