<?php

namespace Tests\Unit\Model;

use App\User;
use App\User_profile;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Tests\TestCase;

class UserTest extends TestCase
{
    public function test_user_model_config()
    {
        $u = new User();

        $this->assertEquals([
            'name',
            'email',
            'password'
        ], $u->getFillable());

        $this->assertEquals([
            'password',
            'remember_token'
        ], $u->getHidden());
    }

    public function test_a_user_has_one_profile()
    {
        $u_pf = new User_profile();
        $relation = $u_pf->user();

        $this->assertInstanceOf(BelongsTo::class, $relation);
    }

    public function test_a_user_belongsToMany_courses()
    {
        $u = new User();
        $relation = $u->courses();

        $this->assertInstanceOf(BelongsToMany::class, $relation);
        $this->assertEquals($u->getForeignKey(), $relation->getForeignPivotKeyName());
    }

    public function test_a_user_belongsToMany_tasks()
    {
        $u = new User();
        $relation = $u->tasks();

        $this->assertInstanceOf(BelongsToMany::class, $relation);
        $this->assertEquals($u->getForeignKey(), $relation->getForeignPivotKeyName());
    }

    public function test_a_user_belongsToMany_subjects()
    {
        $u = new User();
        $relation = $u->subjects();

        $this->assertInstanceOf(BelongsToMany::class, $relation);
        $this->assertEquals($u->getForeignKey(), $relation->getForeignPivotKeyName());
    }
}
