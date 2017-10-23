<?php

namespace App\Models;

use EscapeWork\LaravelSteroids\Model;

class Registration extends Model
{
    protected $table = "registrations";

    protected $fillable = [
    	"student_id",
    	"course_id",
    ];

    public function student()
    {
    	return $this->belongsTo('App\Models\Student', 'student_id', 'id');
    }

    public function course()
    {
    	return $this->belongsTo('App\Models\Course', 'course_id', 'id');
    }
}
