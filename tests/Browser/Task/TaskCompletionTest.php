<?php

namespace Tests\Browser\Task;

use App\Task;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class TaskCompletionTest extends DuskTestCase
{
    use DatabaseMigrations;

    /** @test */
    public function spec_1_1_1_a_user_can_complete_a_task()
    {
        $task = factory(Task::class)->states('incomplete')->create();

        $this->browse(function (Browser $browser) use ($task) {
            $browser->visit('/tasks')
                ->waitForText($task->name)
                ->assertSee($task->name)
                ->press('Complete')
                ->waitForText('Uncomplete')
                ->assertSee('Uncomplete');
        });

        $this->assertTrue($task->fresh()->isComplete());
    }

    /** @test */
    public function spec_1_1_2_a_user_can_uncomplete_a_task()
    {
        $task = factory(Task::class)->states('complete')->create();

        $this->browse(function (Browser $browser) use ($task) {
            $browser->visit('/tasks')
                ->waitForText($task->name)
                ->assertSee($task->name)
                ->press('Uncomplete')
                ->waitForText('Complete')
                ->assertSee('Complete');
        });

        $this->assertFalse($task->fresh()->isComplete());
    }
}
