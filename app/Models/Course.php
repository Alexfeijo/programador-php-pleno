<?php

namespace App\Models;

use EscapeWork\LaravelSteroids\Model;

class Course extends Model
{
    protected $table = 'courses';
    
    protected $fillable = [
    	'title',
    	'description'
    ];
}
