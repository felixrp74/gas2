<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Area
 * 
 * @property int $idarea
 * @property string|null $nombre
 * @property string|null $numero_area
 * 
 * @property Collection|Puesto[] $puestos
 *
 * @package App\Models
 */
class Area extends Model
{
	protected $table = 'area';
	protected $primaryKey = 'idarea';
	public $timestamps = false;

	protected $fillable = [
		'nombre',
		'numero_area'
	];

	public function puestos()
	{
		return $this->belongsToMany(Puesto::class, 'area_has_puesto', 'area_idarea', 'puesto_idpuesto');
	}
}
