<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Task;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TaskTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_user_can_create_a_task()
    {
        $response = $this->post('/tasks', [
            'task' => 'Sample Task',
        ]);

        $response->assertStatus(302);
        $this->assertDatabaseHas('tasks', ['task' => 'Sample Task']);
    }

    /** @test */
    public function a_user_can_mark_a_task_as_completed()
    {
        $task = Task::factory()->create(['completed' => false]);

        $response = $this->post("/tasks/{$task->id}", [
            'completed' => true,
        ]);

        $response->assertStatus(302);
        $this->assertTrue($task->fresh()->completed);
    }

    /** @test */
    public function a_user_can_delete_a_task()
    {
        $task = Task::factory()->create();

        $response = $this->delete("/tasks/{$task->id}");

        $response->assertStatus(302);
        $this->assertDatabaseMissing('tasks', ['id' => $task->id]);
    }
}

