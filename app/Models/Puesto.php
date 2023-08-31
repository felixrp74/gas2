<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Puesto
 * 
 * @property int $idpuesto
 * @property string|null $nombre
 * @property float|null $sueldo_fijo
 * 
 * @property Collection|Area[] $areas
 * @property Collection|Empleado[] $empleados
 *
 * @package App\Models
 */
class Puesto extends Model
{
	protected $table = 'puesto';
	protected $primaryKey = 'idpuesto';
	public $timestamps = false;

	protected $casts = [
		'sueldo_fijo' => 'float'
	];

	protected $fillable = [
		'nombre',
		'sueldo_fijo'
	];

	public function areas()
	{
		return $this->belongsToMany(Area::class, 'area_has_puesto', 'puesto_idpuesto', 'area_idarea');
	}

	public function empleados()
	{
		return $this->hasMany(Empleado::class, 'puesto_idpuesto');
	}
}
