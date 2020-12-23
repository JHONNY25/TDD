<?php

namespace Tests\Feature;

use App\Models\Task;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RouteUpdateTaskTest extends TestCase
{
    /** @test */
    function testRouteUpdateTask()
    {
        $this->withoutExceptionHandling();

        $user = User::factory()->create();
        $task = Task::factory()->create();

        $response = $this->actingAs($user)->call('GET','/update/task',[
            'id'=> $task->id,
        ]);

        $task = Task::with('user')->where('id',$task->id)->first();

        $response->assertOk();
        $response->assertViewIs('Task.create');
        $response->assertViewHas('users',User::all());
        $response->assertViewHas('task',$task);
    }
}
