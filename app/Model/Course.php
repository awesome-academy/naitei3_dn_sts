<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    //
    public function users()
    {
        return $this->belongsToMany(User::class, 'course_users', 'course_id', 'user_id');
    }

    public function subjects()
    {
        return $this->belongsToMany(Subject::class, 'course_subjects', 'course_id', 'subject_id');
    }
}
