<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Admission extends Model
{
	protected $fillable = ['id', 'patient_id', 'admission_date', 'users_id',
						'room', 'category', 'status'];
						
    public function patient()
    {
        return $this->belongsTo('App\Patient');
    }
}
