<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VitalSign extends Model
{
    public function charts()
    {
        return $this->hasOne('App\Chart');
    }

    public function users()
    {
        return $this->hasMany('App\User');
    }
}
