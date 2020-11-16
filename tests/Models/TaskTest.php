<?php
namespace Tests\Models;

use PHPUnit\Framework\TestCase;
use App\Models\Task;
use App\Models\Database;

class TaskTest extends TestCase
{
    public function testGetAllTasks() {

        $table = array(
            array(
                'id' => '1',
                'desc' => 'Task One Test'
            ),
            array(
                'id' => '2',
                'desc' => 'Task Two Test'
            )
        );

        $dbase = $this
        ->getMockBuilder('Database')
        ->setMethods(['resultSet'])
        ->getMock();

        $dbase->method('resultSet')
        ->will($this->returnValue($table));

        $expectedResult = [
            'id' => '1',
            'desc' => 'Task One Test',
        ];

        $task = new Task();
        $actualResult =  $task->getAllTasks();

        $this->assertEquals($expectedResult, $actualResult[0]);

    }
}