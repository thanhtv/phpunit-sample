<?php
namespace Tests;

use PHPUnit\Framework\TestCase;

class StupidTest extends TestCase
{

    //
    public function testTrueIsTrue()
    {
        $foo = true;
        $this->assertTrue($foo);
    }

    public function testFalseIsFalse()
    {
        $foo = false;
        $this->assertFalse($foo);
    }
}
