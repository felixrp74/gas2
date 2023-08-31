<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Proveedor
 * 
 * @property int $idproveedor
 * @property string|null $nombre_comercial
 * @property string|null $nombre_legal
 * @property string|null $ruc
 * 
 * @property Collection|Ga[] $gas
 * @property Collection|ProveedorDireccion[] $proveedor_direccions
 *
 * @package App\Models
 */
class Proveedor extends Model
{
	protected $table = 'proveedor';
	protected $primaryKey = 'idproveedor';
	public $timestamps = false;

	protected $fillable = [
		'nombre_comercial',
		'nombre_legal',
		'ruc'
	];

	public function gas()
	{
		return $this->hasMany(Ga::class, 'proveedor_idproveedor');
	}

	public function proveedor_direccions()
	{
		return $this->hasMany(ProveedorDireccion::class, 'proveedor_idproveedor');
	}
}
