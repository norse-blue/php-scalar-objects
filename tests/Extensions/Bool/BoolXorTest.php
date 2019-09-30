<?php

namespace NorseBlue\ScalarObjects\Test\Extensions\Bool;

use NorseBlue\ScalarObjects\Tests\TestCase;
use NorseBlue\ScalarObjects\Types\BoolType;

class BoolXorTest extends TestCase
{
    /** @test */
    public function bool_xor()
    {
        $false = new BoolType;
        $true = new BoolType(true);

        $this->assertFalse($false->xor(false)->value);
        $this->assertTrue($false->xor(true)->value);
        $this->assertTrue($true->xor(false)->value);
        $this->assertFalse($true->xor(true)->value);

        $this->assertFalse($false->xor(false, false, false)->value);
        $this->assertTrue($false->xor(false, true, false)->value);
        $this->assertFalse($false->xor(true, false, true)->value);
        $this->assertTrue($false->xor(true, true, true)->value);

        $this->assertTrue($true->xor(false, false, false)->value);
        $this->assertFalse($true->xor(false, true, false)->value);
        $this->assertTrue($true->xor(true, false, true)->value);
        $this->assertFalse($true->xor(true, true, true)->value);

        $this->assertFalse($false->xor([false, false, false])->value);
        $this->assertTrue($false->xor([false, true, false])->value);
        $this->assertFalse($false->xor([true, false, true])->value);
        $this->assertTrue($false->xor([true, true, true])->value);

        $this->assertTrue($true->xor([false, false, false])->value);
        $this->assertFalse($true->xor([false, true, false])->value);
        $this->assertTrue($true->xor([true, false, true])->value);
        $this->assertFalse($true->xor([true, true, true])->value);
    }

    /** @test */
    public function bool_xor_with_php_scalar_objects_extension_syntax()
    {
        if (!extension_loaded('scalar_objects')) {
            return;
        }

        $this->assertFalse((false)->xor(false)->value);
        $this->assertTrue((false)->xor(true)->value);
        $this->assertTrue((true)->xor(false)->value);
        $this->assertFalse((true)->xor(true)->value);

        $this->assertFalse((false)->xor(false, false, false)->value);
        $this->assertTrue((false)->xor(false, true, false)->value);
        $this->assertFalse((false)->xor(true, false, true)->value);
        $this->assertTrue((false)->xor(true, true, true)->value);

        $this->assertTrue((true)->xor(false, false, false)->value);
        $this->assertFalse((true)->xor(false, true, false)->value);
        $this->assertTrue((true)->xor(true, false, true)->value);
        $this->assertFalse((true)->xor(true, true, true)->value);

        $this->assertFalse((false)->xor([false, false, false])->value);
        $this->assertTrue((false)->xor([false, true, false])->value);
        $this->assertFalse((false)->xor([true, false, true])->value);
        $this->assertTrue((false)->xor([true, true, true])->value);

        $this->assertTrue((true)->xor([false, false, false])->value);
        $this->assertFalse((true)->xor([false, true, false])->value);
        $this->assertTrue((true)->xor([true, false, true])->value);
        $this->assertFalse((true)->xor([true, true, true])->value);
    }
}
