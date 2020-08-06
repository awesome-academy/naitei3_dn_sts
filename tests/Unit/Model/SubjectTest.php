<?php

namespace Tests\Unit\Model;

use App\Subject;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Tests\TestCase;

class SubjectTest extends TestCase
{
    public function test_subject_model_config()
    {
        $s = new Subject();

        $this->assertEquals([
            'name',
            'image',
            'description',
        ], $s->getFillable());
    }

    public function test_subject_belongToMany_user()
    {
        $s = new Subject();
        $relation = $s->users();

        $this->assertInstanceOf(BelongsToMany::class, $relation);
        $this->assertEquals($s->getForeignKey(), $relation->getForeignPivotKeyName());
    }

    public function test_subject_belongToMany_course()
    {
        $s = new Subject();
        $relation = $s->courses();

        $this->assertInstanceOf(BelongsToMany::class, $relation);
        $this->assertEquals($s->getForeignKey(), $relation->getForeignPivotKeyName());
    }

    public function test_subject_hasMany_task()
    {
        $s = new Subject();
        $relation = $s->tasks();

        $this->assertInstanceOf(HasMany::class, $relation);
    }

}
