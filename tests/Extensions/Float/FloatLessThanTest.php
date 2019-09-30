<?php

namespace NorseBlue\ScalarObjects\Tests\Extensions\Float;

use NorseBlue\ScalarObjects\Facades\FloatFacade as Flt;
use NorseBlue\ScalarObjects\Tests\TestCase;

class FloatLessThanTest extends TestCase
{
    /** @test */
    public function float_less_than()
    {
        $this->assertFalse(Flt::lessThan(9, 3)->value);
        $this->assertFalse(Flt::lessThan(9, 3.1)->value);
        $this->assertTrue(Flt::lessThan(3, 9)->value);
        $this->assertTrue(Flt::lessThan(3, 9.1)->value);
        $this->assertFalse(Flt::lessThan(3, 3)->value);
        $this->assertFalse(Flt::lessThan(3, 2.9)->value);
        $this->assertFalse(Flt::lessThan(3, 3.0)->value);
        $this->assertTrue(Flt::lessThan(3, 3.1)->value);
        $this->assertFalse(Flt::lessThan(9, -3)->value);
        $this->assertFalse(Flt::lessThan(9, -3.0)->value);
        $this->assertTrue(Flt::lessThan(-9, 3)->value);
        $this->assertTrue(Flt::lessThan(-9, 3.0)->value);
    }

    /** @test */
    public function float_less_than_with_php_scalar_objects_extension_syntax()
    {
        if (!extension_loaded('scalar_objects')) {
            return;
        }

        $this->assertFalse((9)->lessThan(3)->value);
        $this->assertFalse((9)->lessThan(3.1)->value);
        $this->assertTrue((3)->lessThan(9)->value);
        $this->assertTrue((3)->lessThan(9.1)->value);
        $this->assertFalse((3)->lessThan(3)->value);
        $this->assertFalse((3)->lessThan(2.9)->value);
        $this->assertFalse((3)->lessThan(3.0)->value);
        $this->assertTrue((3)->lessThan(3.1)->value);
        $this->assertFalse((9)->lessThan(-3)->value);
        $this->assertFalse((9)->lessThan(-3.0)->value);
        $this->assertTrue((-9)->lessThan(3)->value);
        $this->assertTrue((-9)->lessThan(3.0)->value);
    }
}
