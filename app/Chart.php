<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chart extends Model
{
    public function medications()
    {
        return $this->hasMany('App\Medication');
    }

    public function vitalsigns()
    {
        return $this->hasMany('App\VitalSign');
    }
}
