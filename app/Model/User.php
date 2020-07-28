<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Users' roles
     *
     * @var array
     */
    public const ROLES = [
        'supervisor' => 0,
        'trainee' => 1
    ];

    public function user_profile()
    {
        return $this->hasOne(User_profile::class);
    }

    public function courses()
    {
        return $this->belongsToMany(Course::class, 'course_user', 'user_id', 'course_id')->withPivot('role', 'start_day', 'end_day', 'status');;
    }

    public function tasks()
    {
        return $this->belongsToMany(Task::class, 'task_user', 'user_id', 'task_id')->withPivot('report_content', 'status');
    }

    public function subjects()
    {
        return $this->belongsToMany(Subject::class, 'subject_user', 'user_id', 'subject_id');
    }

    public function isSupervisor()
    {
        return Auth::user()->role == self::ROLES['supervisor'];
    }

    public function isTrainee()
    {
        return Auth::user()->role == self::ROLES['trainee'];
    }

    protected $dates = [
        'start_day',
        'end_day',
    ];
}
