<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
         'id', 'name', 'email', 'password', 'role'
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

    // public function roles()
    // {
    //     return $this->belongsToMany('App\Role');
    // }

    // public function hasRole($role)
    // {
    //     //get all role this user has where role= admin----add for another user nya
    //     $roles = $this->roles()->where('name', $role)->count();

    //     if ($roles == 1) {
    //         return true;
    //     }
    //     return false;
    // }

    public function patient()
    {
        return $this->belongsToMany('App\Patient');
    }
    public function department()
    {
        return $this->hasOne('App\Department');
    }

    public function residence()
    {
        return $this->hasOne('App\Residence');
    }

    public function vitalsigns()
    {
        return $this->hasMany('App\VitalSign');
    }

    public function admissions()
    {
        return $this->hasMany('App\Admission');
    }

}
