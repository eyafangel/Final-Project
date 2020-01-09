<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = ['patients_id', 'description', 'task_date'];

    // public function patient()
    // {
    //     return $this->belongsTo('App\Patient');
    // }
}
