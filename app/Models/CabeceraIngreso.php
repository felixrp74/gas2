<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class CabeceraIngreso
 * 
 * @property int $idcabecera_ingresos
 * @property string|null $serie
 * @property string|null $celular
 * @property string|null $ruc
 * @property string|null $direccion
 * @property int $cliente_direccion_idcliente_direccion
 * 
 * @property ClienteDireccion $cliente_direccion
 * @property Collection|DetalleIngreso[] $detalle_ingresos
 *
 * @package App\Models
 */
class CabeceraIngreso extends Model
{
	protected $table = 'cabecera_ingresos';
	protected $primaryKey = 'idcabecera_ingresos';
	public $timestamps = false;

	protected $casts = [
		'cliente_direccion_idcliente_direccion' => 'int'
	];

	protected $fillable = [
		'serie',
		'celular',
		'ruc',
		'direccion',
		'cliente_direccion_idcliente_direccion'
	];

	public function cliente_direccion()
	{
		return $this->belongsTo(ClienteDireccion::class, 'cliente_direccion_idcliente_direccion');
	}

	public function detalle_ingresos()
	{
		return $this->hasMany(DetalleIngreso::class, 'cabecera_ingresos_idcabecera_ingresos');
	}
}
