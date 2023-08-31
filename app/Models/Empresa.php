<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Empresa
 * 
 * @property int $idempresa
 * @property string|null $nombre
 * @property string|null $ruc
 * @property string|null $direccion
 * @property string|null $telefono
 * @property string|null $email
 *
 * @package App\Models
 */
class Empresa extends Model
{
	protected $table = 'empresa';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'idempresa' => 'int'
	];

	protected $fillable = [
		'idempresa',
		'nombre',
		'ruc',
		'direccion',
		'telefono',
		'email'
	];
}
