<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $table = 'schedules';

    public $timestamps = false;

    protected $fillable = [
        'course_code',
        'course_number',
        'units',
        'faculty_teacher',
        'subject_name',
        'size',
        'schedule',
        'department',
        'college',
        'date_created',
    ];
}
