<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'persona_id', 'dni', 'name', 'email', 'password', 'remember_token','created_by',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    

    public function periodos(){
        return $this->belongsToMany('App\Models\Admin\Periodo','userperiodos', 'user_id', 'periodo_id')->withTimestamps();
    }

    public function empresas(){
        return $this->belongsToMany('App\Models\Admin\Empresa','userempresas', 'user_id', 'empresa_id')
        ->withPivot('estado')
        ->withTimestamps()
        ->wherePivot('estado', 1);
    }
    
   


    public function persona()
    {
        return $this->hasOne('App\Models\Publico\Persona', 'dni', 'dni');
    }
}
