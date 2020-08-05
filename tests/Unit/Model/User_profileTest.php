<?php

namespace Tests\Unit\Model;

use App\User_profile;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Tests\TestCase;

class User_profileTest extends TestCase
{
    public function test_user_profile_belongTo_a_user()
    {
        $u_pf = new User_profile();
        $relation = $u_pf->user();

        $this->assertInstanceOf(BelongsTo::class, $relation);
    }
}
