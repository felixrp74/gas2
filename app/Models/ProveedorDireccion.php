<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ProveedorDireccion
 * 
 * @property int $idproveedor_direccion
 * @property string|null $direccion
 * @property string|null $barrio
 * @property string|null $referencia
 * @property string|null $manzana
 * @property string|null $lote
 * @property int $proveedor_idproveedor
 * 
 * @property Proveedor $proveedor
 * @property Collection|CabeceraGasto[] $cabecera_gastos
 *
 * @package App\Models
 */
class ProveedorDireccion extends Model
{
	protected $table = 'proveedor_direccion';
	public $timestamps = false;

	protected $casts = [
		'proveedor_idproveedor' => 'int'
	];

	protected $fillable = [
		'direccion',
		'barrio',
		'referencia',
		'manzana',
		'lote'
	];

	public function proveedor()
	{
		return $this->belongsTo(Proveedor::class, 'proveedor_idproveedor');
	}

	public function cabecera_gastos()
	{
		return $this->hasMany(CabeceraGasto::class, 'proveedor_direccion_proveedor_idproveedor', 'proveedor_idproveedor');
	}
}
