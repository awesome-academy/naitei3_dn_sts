<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    //
    public function users()
    {
        return $this->belongsToMany(User::class, 'task_users', 'task_id', 'user_id');
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }
}
