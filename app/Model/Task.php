<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'subject_id',
        'name',
    ];
    //
    public function users()
    {
        return $this->belongsToMany(User::class, 'task_user', 'task_id', 'user_id')->withPivot('report_content', 'status');
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }
}
