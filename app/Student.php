<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'name'
    ];

    public function grades()
    {
        return $this->hasMany('App\Grade');
    }
}
