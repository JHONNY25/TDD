<?php

namespace Tests\Unit;

use App\Http\Controllers\TaskController;
use App\Models\Task;
use App\Models\User;
use PHPUnit\Framework\TestCase;

class CrudTaskTest extends TestCase
{
    protected $task;

    function __construct()
    {
        $this->setUp();
    }

    function setUp(): void{
        parent::setUp();

        $this->task = new TaskController(new Task());
    }

    /**
     * A basic unit test example.
     *
     * @return void
     */
    function testGetTask()
    {
        $this->task->getTask();
    }
}
