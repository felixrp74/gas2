<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Sede
 * 
 * @property int $idsede
 * @property string|null $nombre
 * @property string|null $direccion
 * @property string|null $telefono
 * @property string|null $numero_departamento
 * 
 * @property Collection|Empleado[] $empleados
 * @property Collection|Ga[] $gas
 *
 * @package App\Models
 */
class Sede extends Model
{
	protected $table = 'sede';
	protected $primaryKey = 'idsede';
	public $timestamps = false;

	protected $fillable = [
		'nombre',
		'direccion',
		'telefono',
		'numero_departamento'
	];

	public function empleados()
	{
		return $this->hasMany(Empleado::class, 'sede_idsede');
	}

	public function gas()
	{
		return $this->hasMany(Ga::class, 'sede_idsede');
	}
}
