<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// use Auth;

class Admission extends Model
{
	protected $fillable = ['id', 'patient_id', 'admission_date', 
                        'users_id', 'room', 'category', 'status', 'created_at', 'updated_at'];


    public function patient()
    {
        return $this->belongsTo('App\Patient');
    }
}
