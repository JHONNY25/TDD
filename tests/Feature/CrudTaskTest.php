<?php

namespace Tests\Feature;

use App\Models\User;
use Tests\TestCase;

class CrudTaskTest extends TestCase
{
    /** @test */
    function testGetTask()
    {
        $this->withoutExceptionHandling();
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get('/get-task');

        $response->assertOk();
    }
}
