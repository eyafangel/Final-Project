<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    protected $fillable = ['id', 'patient_id', 'users_id', 
                        'order', 'status'];

    public function patient()
    {
        return $this->belongsTo('App\Patient');
    }
}
