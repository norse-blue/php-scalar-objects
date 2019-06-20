<?php

namespace NorseBlue\ScalarObjects\Tests\Extensions\Scalars\Number;

use NorseBlue\ScalarObjects\Facades\NumberFacade as Number;
use NorseBlue\ScalarObjects\Tests\TestCase;
use NorseBlue\ScalarObjects\Types\FloatType;
use NorseBlue\ScalarObjects\Types\IntType;

class NumberAbsTest extends TestCase
{
    /** @test */
    public function number_abs()
    {
        $this->assertInstanceOf(IntType::class, Number::abs(9));
        $this->assertInstanceOf(FloatType::class, Number::abs(9.3));
        $this->assertEquals(9, Number::abs(9)->value);
        $this->assertEquals(9.0, Number::abs(9.0)->value);
        $this->assertEquals(9, Number::abs(9)->value);
        $this->assertEquals(9.0, Number::abs(-9.0)->value);
    }
}
