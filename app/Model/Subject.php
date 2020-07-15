<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    //
    public function users()
    {
        return $this->belongsToMany(User::class, 'subject_users', 'subject_id', 'user_id');
    }

    public function courses()
    {
        return $this->belongsToMany(Course::class, 'course_subjects', 'subject_id', 'course_id');
    }

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }
}
