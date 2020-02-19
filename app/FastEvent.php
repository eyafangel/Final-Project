<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FastEvent extends Model
{
    protected $fillable = ['start', 'end', 'color'];
}
