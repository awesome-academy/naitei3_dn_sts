<?php

namespace App\Services;

use App\Subject;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class SubjectService
{
    public function FindSubjectById($id)
    {
        $subject = Subject::find($id);
        if(!$subject){
            throw new ModelNotFoundException('Subject Not Found');
        }

        return $subject;
    }
}
