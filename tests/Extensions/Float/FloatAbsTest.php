<?php

namespace NorseBlue\ScalarObjects\Tests\Extensions\Float;

use NorseBlue\ScalarObjects\Facades\FloatFacade as Floating;
use NorseBlue\ScalarObjects\Tests\TestCase;
use NorseBlue\ScalarObjects\Types\FloatType;

class FloatAbsTest extends TestCase
{
    /** @test */
    public function float_abs()
    {
        $this->assertInstanceOf(FloatType::class, Floating::abs(9));
        $this->assertInstanceOf(FloatType::class, Floating::abs(9.3));
        $this->assertEquals(9, Floating::abs(9)->value);
        $this->assertEquals(9.0, Floating::abs(9.0)->value);
        $this->assertEquals(9, Floating::abs(9)->value);
        $this->assertEquals(9.0, Floating::abs(-9.0)->value);
    }
}
