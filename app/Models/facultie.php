<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class facultie extends Model
{
    use HasFactory;
    
    protected $fillable = [ 
        'id', 'name', 'university_id' 
    ];
}
