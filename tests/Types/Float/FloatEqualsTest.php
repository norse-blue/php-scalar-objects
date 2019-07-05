<?php

namespace NorseBlue\ScalarObjects\Tests\Types\Float;

use NorseBlue\ScalarObjects\Facades\FloatFacade as Floating;
use NorseBlue\ScalarObjects\Tests\TestCase;
use NorseBlue\ScalarObjects\Types\BoolType;

class FloatEqualsTest extends TestCase
{
    /** @test */
    public function float_equals()
    {
        $this->assertInstanceOf(BoolType::class, Floating::equals(5, 5));
        $this->assertInstanceOf(BoolType::class, Floating::equals(5.0, 5));
        $this->assertInstanceOf(BoolType::class, Floating::equals(5, 5.0));
        $this->assertInstanceOf(BoolType::class, Floating::equals(5.0, 5.0));
        $this->assertInstanceOf(BoolType::class, Floating::equals(10, 5));
        $this->assertInstanceOf(BoolType::class, Floating::equals(10.0, 5));
        $this->assertInstanceOf(BoolType::class, Floating::equals(10, 5.0));
        $this->assertInstanceOf(BoolType::class, Floating::equals(10.0, 5.0));

        $this->assertTrue(Floating::equals(5.0, 5.0)->value);
        $this->assertTrue(Floating::equals(5.0, 5)->value);

        $this->assertFalse(Floating::equals(5.0, -5.0)->value);
        $this->assertFalse(Floating::equals(5.0, -5.5)->value);
        $this->assertFalse(Floating::equals(5.0, -5)->value);

        $this->assertFalse(Floating::equals(-5.0, 5.0)->value);
        $this->assertFalse(Floating::equals(-5.0, 5.5)->value);
        $this->assertFalse(Floating::equals(-5.0, 5)->value);
    }
}
