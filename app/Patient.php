<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
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

    

}
