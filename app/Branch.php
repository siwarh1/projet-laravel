<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    protected $table = 'branches';

    public function faculty()
    {
        return $this->belongsTo('App\Faculty');
    }

    public function students()
    {
        return $this->hasMany('App\Student');
    }
}
