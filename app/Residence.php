<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Residence extends Model
{
    protected $fillable = ['lot', 'street', 
                        'city', 'postal_code', 'province', 
                        'country'];

    public function patient()
    {
        return $this->belongsTo('App\Patient');
    }

    // public function user()
    // {
    //     return $this->belongsTo('App\User');
    // }
}
