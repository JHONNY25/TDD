<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CrudTaskTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function testGetTask()
    {
        $this->withoutExceptionHandling();
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get('/get-task');

        $response->assertOk();
    }

    /** @test */
    function testCreateTask()
    {
        $this->withoutExceptionHandling();

        $user = User::factory()->create();
        $asignTo = User::factory()->create();

        $response = $this->actingAs($user)->post('/save-task',[
            'name' => 'Task one',
            'description' => 'description test',
            'user' => $asignTo->id
        ],['X-CSRF-TOKEN' => csrf_token()]);

        $response->assertStatus(302);
        $response->assertSessionHas(['success']);
    }
}
