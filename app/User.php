<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    
    /**
     * Get the wish associated with the user.
     */
    public function deseos(){
        return $this->hasMany('App\Deseo', 'id_usuario');
    }
    
    /**
     * Get the carrito associated with the user.
     */
    public function carritos(){
        return $this->hasMany('App\Carrito', 'usuario_id');
    }
    
    /**
     * checks if the user belongs to a particular group
     * @param string|array $role
     * @return bool
     */
    public function role_id($role) {
        $role = (array)$role;
        return in_array($this->role_id, $role);
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
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
}
