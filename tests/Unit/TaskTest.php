<?php
namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Task;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TaskTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_task_can_be_created()
    {
        $task = Task::factory()->create([
            'task' => 'Sample Task',
        ]);

        $this->assertDatabaseHas('tasks', ['task' => 'Sample Task']);
    }

    /** @test */
    public function a_task_can_be_marked_as_completed()
    {
        $task = Task::factory()->create(['completed' => false]);

        $task->completed = true;
        $task->save();

        $this->assertTrue($task->fresh()->completed);
    }

    /** @test */
    public function a_task_can_be_deleted()
    {
        $task = Task::factory()->create();

        $task->delete();

        $this->assertDatabaseMissing('tasks', ['id' => $task->id]);
    }
}
