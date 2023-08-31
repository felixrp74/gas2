<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class SedeHasGa
 * 
 * @property int $sede_idsede
 * @property int $gas_idgas
 * 
 * @property Ga $ga
 * @property Sede $sede
 *
 * @package App\Models
 */
class SedeHasGa extends Model
{
	protected $table = 'sede_has_gas';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'sede_idsede' => 'int',
		'gas_idgas' => 'int'
	];

	public function ga()
	{
		return $this->belongsTo(Ga::class, 'gas_idgas');
	}

	public function sede()
	{
		return $this->belongsTo(Sede::class, 'sede_idsede');
	}
}
