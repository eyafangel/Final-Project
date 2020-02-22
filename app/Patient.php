<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{

    protected $fillable = ['id', 'last_name', 'first_name', 
                        'middle_name', 'sex', 'birthday', 
                        'age', 'contact_number', 'marital_status', 
                        'nationality'];

                        
    public function admissions()
    {
        return $this->hasMany('App\Admission');
    }

    public function residence()
    {
        return $this->hasOne('App\Residence');
    }

    public function guardian()
    {
        return $this->hasOne('App\Guardian');
    }

    public function charts()
    {
        return $this->hasMany('App\Chart');
    }

    public function orders()
    {
        return $this->hasMany('App\Orders');
    }

    public function users()
    {
        return $this->belongsToMany('App\User')->withTimestamps();
    }
}
