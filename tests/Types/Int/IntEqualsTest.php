<?php

namespace NorseBlue\ScalarObjects\Tests\Types\Int;

use NorseBlue\ScalarObjects\Facades\IntFacade as Integer;
use NorseBlue\ScalarObjects\Tests\TestCase;
use NorseBlue\ScalarObjects\Types\BoolType;

class IntEqualsTest extends TestCase
{
    /** @test */
    public function int_equals()
    {
        $this->assertInstanceOf(BoolType::class, Integer::equals(5, 5));
        $this->assertInstanceOf(BoolType::class, Integer::equals(10, 5));

        $this->assertTrue(Integer::equals(5, 5)->value);
        $this->assertTrue(Integer::equals(5, 5.0)->value);
        $this->assertTrue(Integer::equals(-5, -5.0)->value);
        $this->assertFalse(Integer::equals(5, 5.5)->value);

        $this->assertFalse(Integer::equals(5, -5)->value);
        $this->assertFalse(Integer::equals(5, -5.0)->value);
        $this->assertFalse(Integer::equals(5, -5.5)->value);

        $this->assertFalse(Integer::equals(-5, 5)->value);
        $this->assertFalse(Integer::equals(-5, 5.0)->value);
        $this->assertFalse(Integer::equals(-5, 5.5)->value);
    }
}
