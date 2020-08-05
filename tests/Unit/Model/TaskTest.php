<?php

namespace Tests\Unit\Model;

use App\Task;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Tests\TestCase;

class TaskTest extends TestCase
{
    public function test_task_model_config()
    {
        $t = new Task();

        $this->assertEquals([
            'subject_id',
            'name',
        ], $t->getFillable());
    }

    public function test_task_belongToMany_user()
    {
        $t = new Task();
        $relation = $t->users();

        $this->assertInstanceOf(BelongsToMany::class, $relation);
        $this->assertEquals($t->getForeignKey(), $relation->getForeignPivotKeyName());
    }

    public function test_task_belongTo_a_subject()
    {
        $t = new Task();
        $relation = $t->subject();

        $this->assertInstanceOf(BelongsTo::class, $relation);
    }
}
