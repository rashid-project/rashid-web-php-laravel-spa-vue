<?php

namespace Tests\Browser\Task;

use App\Task;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class CompleteTaskTest extends DuskTestCase
{
    use DatabaseMigrations;

    /** @test */
    public function a_user_can_complete_a_task()
    {
        $task = factory(Task::class)->create();

        $this->browse(function (Browser $browser) use ($task) {
            $browser->visit('/tasks')
                ->waitForText($task->name)
                ->assertSee($task->name)
                ->press('Complete')
                ->assertSee('Completed');
        });
    }
}
