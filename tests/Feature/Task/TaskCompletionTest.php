<?php

namespace Tests\Feature\Task;

use App\Task;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TaskCompletionTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function spec_1_1_1_a_user_can_complete_a_task()
    {
        $this->withoutExceptionHandling();

        $task = factory(Task::class)->states('incomplete')->create();

        $response = $this->post(route('task.complete', ['task' => $task]));

        $response->assertSuccessful(200);

        $task = $task->fresh();

        $response->assertJson([
            'data' => $task->toArray(),
        ]);

        $this->assertTrue($task->isComplete());
    }

    /** @test */
    public function spec_1_1_2_a_user_can_uncomplete_a_task()
    {
        $this->withoutExceptionHandling();

        $task = factory(Task::class)->states('complete')->create();

        $response = $this->post(route('task.uncomplete', ['task' => $task]));

        $response->assertSuccessful(200);

        $task = $task->fresh();

        $response->assertJson([
            'data' => $task->toArray(),
        ]);

        $this->assertFalse($task->isComplete());
    }
}
