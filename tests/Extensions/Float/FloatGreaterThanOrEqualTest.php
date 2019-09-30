<?php

namespace NorseBlue\ScalarObjects\Tests\Extensions\Float;

use NorseBlue\ScalarObjects\Facades\FloatFacade as Flt;
use NorseBlue\ScalarObjects\Tests\TestCase;

class FloatGreaterThanOrEqualTest extends TestCase
{
    /** @test */
    public function float_greater_than_or_equal()
    {
        $this->assertFalse(Flt::greaterThanOrEqual(3.0, 9)->value);
        $this->assertFalse(Flt::greaterThanOrEqual(3.0, 9.1)->value);
        $this->assertTrue(Flt::greaterThanOrEqual(9.0, 3)->value);
        $this->assertTrue(Flt::greaterThanOrEqual(9.0, 3.1)->value);
        $this->assertTrue(Flt::greaterThanOrEqual(3.0, 3)->value);
        $this->assertTrue(Flt::greaterThanOrEqual(3.0, 2.9)->value);
        $this->assertTrue(Flt::greaterThanOrEqual(3.0, 3.0)->value);
        $this->assertFalse(Flt::greaterThanOrEqual(3.0, 3.1)->value);
        $this->assertTrue(Flt::greaterThanOrEqual(3.0, -9)->value);
        $this->assertTrue(Flt::greaterThanOrEqual(3.0, -9.1)->value);
        $this->assertFalse(Flt::greaterThanOrEqual(-3.0, 9)->value);
        $this->assertFalse(Flt::greaterThanOrEqual(-3.0, 9.1)->value);
    }

    /** @test */
    public function float_greater_than_or_equal_with_php_scalar_objects_extension_syntax()
    {
        if (!extension_loaded('scalar_objects')) return;

        $this->assertFalse((3.0)->greaterThanOrEqual(9)->value);
        $this->assertFalse((3.0)->greaterThanOrEqual(9.1)->value);
        $this->assertTrue((9.0)->greaterThanOrEqual(3)->value);
        $this->assertTrue((9.0)->greaterThanOrEqual(3.1)->value);
        $this->assertTrue((3.0)->greaterThanOrEqual(3)->value);
        $this->assertTrue((3.0)->greaterThanOrEqual(2.9)->value);
        $this->assertTrue((3.0)->greaterThanOrEqual(3.0)->value);
        $this->assertFalse((3.0)->greaterThanOrEqual(3.1)->value);
        $this->assertTrue((3.0)->greaterThanOrEqual(-9)->value);
        $this->assertTrue((3.0)->greaterThanOrEqual(-9.1)->value);
        $this->assertFalse((-3.0)->greaterThanOrEqual(9)->value);
        $this->assertFalse((-3.0)->greaterThanOrEqual(9.1)->value);
    }
}
