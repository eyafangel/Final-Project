<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    protected $fillable = ['id', 'patient_id', 'users_id', 
                        'message', 'status', 'orderDate'];

    public function patient()
    {
        return $this->belongsTo('App\Patient');
    }

    public function user()
    {
        return $this->hasOne('App\User');
    }
}
