<?php

namespace App\Models;

use EscapeWork\LaravelSteroids\Model;
use Carbon\Carbon;

class Student extends Model
{
    protected $table = "students";

    protected $fillable = [
    	"name",
    	"email",
    	"born_date"
    ];

    protected $dates = ["born_date"];

    protected $presenter = 'App\Presenters\StudentPresenter';

    public function setBornDateAttribute($value)
    {
    	$this->attributes['born_date'] = Carbon::createFromFormat("d/m/Y", $value);
    }
}
