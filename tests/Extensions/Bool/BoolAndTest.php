<?php

namespace NorseBlue\ScalarObjects\Test\Extensions\Bool;

use NorseBlue\ScalarObjects\Tests\TestCase;
use NorseBlue\ScalarObjects\Types\BoolType;

class BoolAndTest extends TestCase
{
    /** @test */
    public function bool_and()
    {
        $false = new BoolType();
        $true = new BoolType(true);

        $this->assertFalse($false->and(false)->value);
        $this->assertFalse($false->and(true)->value);
        $this->assertFalse($true->and(false)->value);
        $this->assertTrue($true->and(true)->value);

        $this->assertFalse($false->and(false, false, false)->value);
        $this->assertFalse($false->and(false, true, false)->value);
        $this->assertFalse($false->and(true, false, true)->value);
        $this->assertFalse($false->and(true, true, true)->value);

        $this->assertFalse($true->and(false, false, false)->value);
        $this->assertFalse($true->and(false, true, false)->value);
        $this->assertFalse($true->and(true, false, true)->value);
        $this->assertTrue($true->and(true, true, true)->value);

        $this->assertFalse($false->and([false, true, false])->value);
        $this->assertFalse($false->and([false, false, false])->value);
        $this->assertFalse($false->and([true, false, true])->value);
        $this->assertFalse($false->and([true, true, true])->value);

        $this->assertFalse($true->and([false, false, false])->value);
        $this->assertFalse($true->and([false, true, false])->value);
        $this->assertFalse($true->and([true, false, true])->value);
        $this->assertTrue($true->and([true, true, true])->value);
    }

    /** @test */
    public function bool_and_with_php_scalar_objects_extension_syntax()
    {
        if (!extension_loaded('scalar_objects')) {
            return;
        }

        $this->assertFalse((false)->and(false)->value);
        $this->assertFalse((false)->and(true)->value);
        $this->assertFalse((true)->and(false)->value);
        $this->assertTrue((true)->and(true)->value);

        $this->assertFalse((false)->and(false, false, false)->value);
        $this->assertFalse((false)->and(false, true, false)->value);
        $this->assertFalse((false)->and(true, false, true)->value);
        $this->assertFalse((false)->and(true, true, true)->value);

        $this->assertFalse((true)->and(false, false, false)->value);
        $this->assertFalse((true)->and(false, true, false)->value);
        $this->assertFalse((true)->and(true, false, true)->value);
        $this->assertTrue((true)->and(true, true, true)->value);

        $this->assertFalse((false)->and([false, true, false])->value);
        $this->assertFalse((false)->and([false, false, false])->value);
        $this->assertFalse((false)->and([true, false, true])->value);
        $this->assertFalse((false)->and([true, true, true])->value);

        $this->assertFalse((true)->and([false, false, false])->value);
        $this->assertFalse((true)->and([false, true, false])->value);
        $this->assertFalse((true)->and([true, false, true])->value);
        $this->assertTrue((true)->and([true, true, true])->value);
    }
}
