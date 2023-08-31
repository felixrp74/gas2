<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gas extends Model
{
    use HasFactory;

    protected $table = 'gas';    
    public $timestamps = false;
	protected $primaryKey = 'idgas';

    protected $fillable = [
        "idgas" ,
        "descripcion" , 
        "peso" ,
        "tipo" ,
        "precio" ,
        "cantidad" ,
        "marca" ,
        "cantidad_vacios" ,
        "proveedor_idproveedor"
    ];
}
