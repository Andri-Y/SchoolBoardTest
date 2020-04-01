<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    protected $fillable = [
        'value'
    ];

    public function student()
    {
        return $this->hasOne('App\Student');
    }
}
