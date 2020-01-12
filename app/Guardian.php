<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guardian extends Model
{
    protected $fillable = ['guardian_last_name', 'guardian_first_name', 
                        'guardian_middle_name', 'relationship_to_patient', 
                        'guardian_contact_number'];

    public function patient()
    {
        return $this->belongsTo('App\Patient');
    }
}
