<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RouteHomeTest extends TestCase
{
    /** @test route /home */
    public function testRouteHome()
    {
        $this->withoutExceptionHandling();

        $user = User::factory()->create();

        $response = $this->actingAs($user)->get('/home');

        $response->assertStatus(200);
    }
}
