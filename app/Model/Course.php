<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    //
    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function subjects()
    {
        return $this->belongsToMany(Subject::class);
    }
}
