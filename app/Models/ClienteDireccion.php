<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ClienteDireccion
 * 
 * @property int $idcliente_direccion
 * @property string|null $direccion
 * @property string|null $barrio
 * @property string|null $referencia
 * @property string|null $manzana
 * @property string|null $lote
 * @property int $cliente_idcliente
 * 
 * @property Cliente $cliente
 * @property Collection|CabeceraIngreso[] $cabecera_ingresos
 *
 * @package App\Models
 */
class ClienteDireccion extends Model
{
	protected $table = 'cliente_direccion';
	protected $primaryKey = 'idcliente_direccion';
	public $timestamps = false;

	protected $casts = [
		'cliente_idcliente' => 'int'
	];

	protected $fillable = [
		'direccion',
		'barrio',
		'referencia',
		'manzana',
		'lote',
		'cliente_idcliente'
	];

	public function cliente()
	{
		return $this->belongsTo(Cliente::class, 'cliente_idcliente');
	}

	public function cabecera_ingresos()
	{
		return $this->hasMany(CabeceraIngreso::class, 'cliente_direccion_idcliente_direccion');
	}
}
