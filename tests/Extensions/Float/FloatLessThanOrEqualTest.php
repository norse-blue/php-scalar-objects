<?php

namespace NorseBlue\ScalarObjects\Tests\Extensions\Float;

use NorseBlue\ScalarObjects\Facades\FloatFacade as Floating;
use NorseBlue\ScalarObjects\Tests\TestCase;

class FloatLessThanOrEqualTest extends TestCase
{
    /** @test */
    public function float_less_than_or_equal()
    {
        $this->assertFalse(Floating::lessThanOrEqual(9.0, 3)->value);
        $this->assertFalse(Floating::lessThanOrEqual(9.0, 3.1)->value);
        $this->assertTrue(Floating::lessThanOrEqual(3.0, 9)->value);
        $this->assertTrue(Floating::lessThanOrEqual(3.0, 9.1)->value);
        $this->assertTrue(Floating::lessThanOrEqual(3.0, 3)->value);
        $this->assertFalse(Floating::lessThanOrEqual(3.0, 2.9)->value);
        $this->assertTrue(Floating::lessThanOrEqual(3.0, 3.0)->value);
        $this->assertTrue(Floating::lessThanOrEqual(3.0, 3.1)->value);
        $this->assertFalse(Floating::lessThanOrEqual(9.0, -3)->value);
        $this->assertFalse(Floating::lessThanOrEqual(9.0, -3.1)->value);
        $this->assertTrue(Floating::lessThanOrEqual(-9.0, 3)->value);
        $this->assertTrue(Floating::lessThanOrEqual(-9.0, 3.1)->value);
    }
}
