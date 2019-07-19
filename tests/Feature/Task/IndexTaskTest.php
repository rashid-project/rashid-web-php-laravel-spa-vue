<?php

namespace Tests\Feature\Task;

use App\Task;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class IndexTaskTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function get_a_list_of_tasks()
    {
        $this->withoutExceptionHandling();

        $task = factory(Task::class)->create();

        $response = $this->get('/api/task');

        $response->assertStatus(200);

        $response->assertJson([
            'data' => [$task->toArray()]
        ]);
    }
}
