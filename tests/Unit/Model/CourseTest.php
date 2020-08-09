<?php

namespace Tests\Unit\Model;

use App\Course;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Tests\TestCase;

class CourseTest extends TestCase
{
    public function test_model_configuration()
    {
        $m = new Course();
        $this->assertEquals([
            'name',
            'image',
            'description',
            'duration',
            'duration_type',
            'status',
            'start_day',
            'end_day',
        ], $m->getFillable());
    }

    public function test_users_relation()
    {
        $m = new Course();
        $user_relation = $m->users();
        $this->assertInstanceOf(BelongsToMany::class, $user_relation);
        $this->assertEquals($m->getForeignKey(), $user_relation->getForeignPivotKeyName());
    }

    public function test_subjects_relation()
    {
        $m = new Course();
        $sbj_relation = $m->subjects();
        $this->assertInstanceOf(BelongsToMany::class, $sbj_relation);
        $this->assertEquals($m->getForeignKey(), $sbj_relation->getForeignPivotKeyName());
    }
}
