<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Faculty extends Model
{

    protected $table = 'faculties';

    public function university()
    {
        return $this->belongsTo('App\University');
    }

    public function branches()
    {
        return $this->hasMany('App\Branch');
    }
}
