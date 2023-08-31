<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Empleado
 * 
 * @property int $idempleado
 * @property string|null $nombre
 * @property string|null $apellido_paterno
 * @property string|null $apellido_materno
 * @property string|null $direccion
 * @property string|null $celular
 * @property string|null $email
 * @property int|null $dias_asistidos
 * @property int $puesto_idpuesto
 * @property int $sede_idsede
 * 
 * @property Puesto $puesto
 * @property Sede $sede
 * @property Collection|DetalleRol[] $detalle_rols
 *
 * @package App\Models
 */
class Empleado extends Model
{
	protected $table = 'empleado';
	public $timestamps = false;

	protected $casts = [
		'dias_asistidos' => 'int',
		'puesto_idpuesto' => 'int',
		'sede_idsede' => 'int'
	];

	protected $fillable = [
		'DNI',
		'nombre',
		'apellido_paterno',
		'apellido_materno',
		'direccion',
		'celular',
		'email',
		'dias_asistidos',
		'puesto_idpuesto',
		'sede_idsede'
	];

	public function puesto()
	{
		return $this->belongsTo(Puesto::class, 'puesto_idpuesto');
	}

	public function sede()
	{
		return $this->belongsTo(Sede::class, 'sede_idsede');
	}

	public function detalle_rols()
	{
		return $this->hasMany(DetalleRol::class, 'empleado_idempleado');
	}
}
