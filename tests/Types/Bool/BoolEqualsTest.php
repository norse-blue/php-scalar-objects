<?php

namespace NorseBlue\ScalarObjects\Tests\Types\Bool;

use NorseBlue\ScalarObjects\Facades\BoolFacade as Boolean;
use NorseBlue\ScalarObjects\Tests\TestCase;
use NorseBlue\ScalarObjects\Types\BoolType;

class BoolEqualsTest extends TestCase
{
    /** @test */
    public function bool_equals()
    {
        $this->assertInstanceOf(BoolType::class, Boolean::equals(false, false));
        $this->assertInstanceOf(BoolType::class, Boolean::equals(false, true));
        $this->assertInstanceOf(BoolType::class, Boolean::equals(true, false));
        $this->assertInstanceOf(BoolType::class, Boolean::equals(true, true));

        $this->assertTrue(Boolean::equals(false, false)->value);
        $this->assertFalse(Boolean::equals(false, true)->value);
        $this->assertFalse(Boolean::equals(true, false)->value);
        $this->assertTrue(Boolean::equals(true, true)->value);

        $this->assertTrue(Boolean::equals(false, new BoolType(false))->value);
        $this->assertFalse(Boolean::equals(false, new BoolType(true))->value);
        $this->assertFalse(Boolean::equals(true, new BoolType(false))->value);
        $this->assertTrue(Boolean::equals(true, new BoolType(true))->value);
    }
}
