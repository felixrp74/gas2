<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class AreaHasPuesto
 * 
 * @property int $area_idarea
 * @property int $puesto_idpuesto
 * 
 * @property Area $area
 * @property Puesto $puesto
 *
 * @package App\Models
 */
class AreaHasPuesto extends Model
{
	protected $table = 'area_has_puesto';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'area_idarea' => 'int',
		'puesto_idpuesto' => 'int'
	];

	public function area()
	{
		return $this->belongsTo(Area::class, 'area_idarea');
	}

	public function puesto()
	{
		return $this->belongsTo(Puesto::class, 'puesto_idpuesto');
	}
}
