<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RouteCreateTaskTest extends TestCase
{
    /** @test */
    public function testRouteCreateTask()
    {
        $this->withoutExceptionHandling();

        $user = User::factory()->create();

        $response = $this->actingAs($user)->get('/create-task');

        $response->assertStatus(200);
        $response->assertViewIs('Task.create');
        $response->assertViewHas('users',User::all());
    }
}
