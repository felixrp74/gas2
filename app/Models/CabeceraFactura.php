<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class CabeceraFactura
 * 
 * @property int $idcabecera_factura
 * @property string|null $serie
 * @property string|null $celular
 * @property string|null $ruc
 * @property string|null $direccion
 * @property int $cliente_direccion_idcliente_direccion
 * 
 * @property ClienteDireccion $cliente_direccion
 * @property Collection|DetalleFactura[] $detalle_facturas
 *
 * @package App\Models
 */
class CabeceraFactura extends Model
{
	protected $table = 'cabecera_factura';
	public $timestamps = false;
	protected $primaryKey = 'idcabecera_factura';
	

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

	public function detalle_facturas()
	{
		return $this->hasMany(DetalleFactura::class, 'cabecera_factura_idcabecera_factura');
	}
}
