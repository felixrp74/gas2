<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'dni',
		'name',
		'apellido_paterno',
		'apellido_materno',
		'celular',
		'email',
		'password',
		'two_factor_secret',
		'two_factor_recovery_codes',
		'usuario',
		'tipo',
		'email_verified_at',
		'tipo_usuario',
		'identificador_secretaria',
		'identificador_supervisor_logistica',
		'identificador_gerente',
		'identificador_contador',
		'identificador_chofer_moto',
		'identificador_chofer_trailer',
		'remember_token',
		'current_team_id',
		'profile_photo_path'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    // relacion uno a muchos
    public function posts(){
        return $this->hasMany(Post::class);
    }


}
