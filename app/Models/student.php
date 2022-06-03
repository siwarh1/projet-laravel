<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class student extends Model
{
    use HasFactory;
    
    protected $fillable = [ 
        'id', 'firstname','lastname','birthday','branch_id'
    ];
}
