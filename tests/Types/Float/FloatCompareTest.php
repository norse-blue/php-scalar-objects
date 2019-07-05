<?php

namespace NorseBlue\ScalarObjects\Tests\Types\Float;

use NorseBlue\ScalarObjects\Facades\FloatFacade as Floating;
use NorseBlue\ScalarObjects\Tests\TestCase;
use NorseBlue\ScalarObjects\Types\FloatType;

class FloatCompareTest extends TestCase
{
    /** @test */
    public function float_compare()
    {
        $this->assertInstanceOf(FloatType::class, Floating::compare(10, 5));
        $this->assertInstanceOf(FloatType::class, Floating::compare(5, 5));
        $this->assertInstanceOf(FloatType::class, Floating::compare(5, 10));
        $this->assertInstanceOf(FloatType::class, Floating::compare(10.0, 5.0));
        $this->assertInstanceOf(FloatType::class, Floating::compare(5.0, 5.0));
        $this->assertInstanceOf(FloatType::class, Floating::compare(5.0, 10.0));

        $this->assertGreaterThan(0, Floating::compare(10.0, 5.0)->value);
        $this->assertGreaterThan(0, Floating::compare(10.0, 5.5)->value);
        $this->assertGreaterThan(0, Floating::compare(10.0, 5)->value);

        $this->assertGreaterThan(0, Floating::compare(10.0, -5.0)->value);
        $this->assertGreaterThan(0, Floating::compare(10.0, -5.5)->value);
        $this->assertGreaterThan(0, Floating::compare(10.0, -5)->value);

        $this->assertGreaterThan(0, Floating::compare(5.0, -5.0)->value);
        $this->assertGreaterThan(0, Floating::compare(5.0, -5.5)->value);
        $this->assertGreaterThan(0, Floating::compare(5.0, -5)->value);

        $this->assertEquals(0, Floating::compare(5.0, 5.0)->value);
        $this->assertEquals(0, Floating::compare(5.0, 5)->value);

        $this->assertLessThan(0, Floating::compare(-5.0, 5.0)->value);
        $this->assertLessThan(0, Floating::compare(-5.0, 5.5)->value);
        $this->assertLessThan(0, Floating::compare(-5.0, 5)->value);

        $this->assertLessThan(0, Floating::compare(5.0, 10.0)->value);
        $this->assertLessThan(0, Floating::compare(5.0, 10.5)->value);
        $this->assertLessThan(0, Floating::compare(5.0, 10)->value);

        $this->assertLessThan(0, Floating::compare(-5.0, 10.0)->value);
        $this->assertLessThan(0, Floating::compare(-5.0, 10.5)->value);
        $this->assertLessThan(0, Floating::compare(-5.0, 10)->value);
    }
}
