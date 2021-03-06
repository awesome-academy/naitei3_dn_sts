<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{

    protected $fillable = [
        'name',
        'image',
        'description',
    ];
    //
    public function users()
    {
        return $this->belongsToMany(User::class, 'subject_user', 'subject_id', 'user_id');
    }

    public function courses()
    {
        return $this->belongsToMany(Course::class, 'course_subject', 'subject_id', 'course_id')->withPivot('status');
    }

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }
}
