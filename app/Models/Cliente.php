<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Cliente
 * 
 * @property int $idcliente
 * @property string|null $nombre
 * @property string|null $apellido_paterno
 * @property string|null $apellido_materno
 * @property string|null $dni
 * @property string|null $ruc
 * 
 * @property Collection|ClienteDireccion[] $cliente_direccions
 * @property Collection|Ga[] $gas
 *
 * @package App\Models
 */
class Cliente extends Model
{
	protected $table = 'cliente';
	protected $primaryKey = 'idcliente';
	public $timestamps = false;

	protected $fillable = [
		'nombre',
		'apellido_paterno',
		'apellido_materno',
		'dni',
		'ruc'
	];

	public function cliente_direccions()
	{
		return $this->hasMany(ClienteDireccion::class, 'cliente_idcliente');
	}

	public function gas()
	{
		return $this->hasMany(Ga::class, 'cliente_idcliente');
	}
}
