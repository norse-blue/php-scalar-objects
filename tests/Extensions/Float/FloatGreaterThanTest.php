<?php

namespace NorseBlue\ScalarObjects\Tests\Extensions\Float;

use NorseBlue\ScalarObjects\Facades\FloatFacade as Flt;
use NorseBlue\ScalarObjects\Tests\TestCase;

class FloatGreaterThanTest extends TestCase
{
    /** @test */
    public function float_greater_than()
    {
        $this->assertFalse(Flt::greaterThan(3.0, 9)->value);
        $this->assertFalse(Flt::greaterThan(3.0, 9.1)->value);
        $this->assertTrue(Flt::greaterThan(9.0, 3)->value);
        $this->assertTrue(Flt::greaterThan(9.0, 3.1)->value);
        $this->assertFalse(Flt::greaterThan(3.0, 3)->value);
        $this->assertTrue(Flt::greaterThan(3.0, 2.9)->value);
        $this->assertFalse(Flt::greaterThan(3.0, 3.0)->value);
        $this->assertFalse(Flt::greaterThan(3.0, 3.1)->value);
        $this->assertTrue(Flt::greaterThan(3.0, -9)->value);
        $this->assertTrue(Flt::greaterThan(3.0, -9.1)->value);
        $this->assertFalse(Flt::greaterThan(-3.0, 9)->value);
        $this->assertFalse(Flt::greaterThan(-3.0, 9.1)->value);
    }

    /** @test */
    public function float_greater_than_with_php_scalar_objects_extension_syntax()
    {
        if (!extension_loaded('scalar_objects')) return;

        $this->assertFalse((3.0)->greaterThan(9)->value);
        $this->assertFalse((3.0)->greaterThan(9.1)->value);
        $this->assertTrue((9.0)->greaterThan(3)->value);
        $this->assertTrue((9.0)->greaterThan(3.1)->value);
        $this->assertFalse((3.0)->greaterThan(3)->value);
        $this->assertTrue((3.0)->greaterThan(2.9)->value);
        $this->assertFalse((3.0)->greaterThan(3.0)->value);
        $this->assertFalse((3.0)->greaterThan(3.1)->value);
        $this->assertTrue((3.0)->greaterThan(-9)->value);
        $this->assertTrue((3.0)->greaterThan(-9.1)->value);
        $this->assertFalse((-3.0)->greaterThan(9)->value);
        $this->assertFalse((-3.0)->greaterThan(9.1)->value);
    }
}
