<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'email', 'password', 'suspend'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function roles() {
        return $this->belongsToMany(Role::class);
    }

    public function hasRoles($roles) {
        
        if ( is_array($roles) ) {
            if ( $this->roles()->whereIn('role', $roles)->count() > 0 ) return true;
        }else{
            if ( $this->roles()->where('role', $roles)->first() ) return true;
        }
        return false;
        
    }
}