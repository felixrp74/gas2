<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int    $idEstudiantes
 * @property string $dni
 * @property string $Nombre
 * @property string $Apellido_Paterno
 * @property string $Apellido_Materno
 * @property string $Dirección
 * @property string $Telefono_Celular
 * @property string $Correo_Electronico
 * @property Date   $Fecha_Nacimiento
 */
class Estudiante extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'estudiante';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'idEstudiantes';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'dni', 'Nombre', 'Apellido_Paterno', 'Apellido_Materno', 'Fecha_Nacimiento', 'Género', 'Dirección', 'Telefono_Celular', 'Correo_Electronico'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'idEstudiantes' => 'int', 'dni' => 'string', 'Nombre' => 'string', 'Apellido_Paterno' => 'string', 'Apellido_Materno' => 'string', 'Fecha_Nacimiento' => 'date', 'Dirección' => 'string', 'Telefono_Celular' => 'string', 'Correo_Electronico' => 'string'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'Fecha_Nacimiento'
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var boolean
     */
    public $timestamps = true;

    // Scopes...

    // Functions ...

    // Relations ...
}
