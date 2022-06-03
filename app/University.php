<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class University extends Model
{
    protected $table = 'universities';

    public function faculties()
    {
        return $this->hasMany('App\Faculty');
    }
}
