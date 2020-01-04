<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medication extends Model
{
    public function charts()
    {
        return $this->hasMany('App\Chart');
    }
}
