<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = [
        'name',
        'image',
        'description',
        'duration',
        'duration_type',
        'status',
        'start_day',
        'end_day',
    ];
    //
    public function users()
    {
        return $this->belongsToMany(User::class, 'course_user', 'course_id', 'user_id')->withPivot('role', 'start_day', 'end_day', 'status');
    }

    public function subjects()
    {
        return $this->belongsToMany(Subject::class, 'course_subject', 'course_id', 'subject_id')->withPivot('status');
    }

    protected $dates = [
        'start_day',
        'end_day',
    ];
}
