<?php

namespace NorseBlue\ScalarObjects\Tests\Types\Int;

use NorseBlue\ScalarObjects\Facades\IntFacade as Integer;
use NorseBlue\ScalarObjects\Tests\TestCase;
use NorseBlue\ScalarObjects\Types\IntType;

class IntCompareTest extends TestCase
{
    /** @test */
    public function int_compare()
    {
        $this->assertInstanceOf(IntType::class, Integer::compare(10, 5));
        $this->assertInstanceOf(IntType::class, Integer::compare(5, 5));
        $this->assertInstanceOf(IntType::class, Integer::compare(5, 10));

        $this->assertGreaterThan(0, Integer::compare(10, 5)->value);
        $this->assertGreaterThan(0, Integer::compare(10, 5.0)->value);
        $this->assertGreaterThan(0, Integer::compare(10, 5.5)->value);

        $this->assertGreaterThan(0, Integer::compare(10, -5)->value);
        $this->assertGreaterThan(0, Integer::compare(10, -5.0)->value);
        $this->assertGreaterThan(0, Integer::compare(10, -5.5)->value);

        $this->assertGreaterThan(0, Integer::compare(5, -5)->value);
        $this->assertGreaterThan(0, Integer::compare(5, -5.0)->value);
        $this->assertGreaterThan(0, Integer::compare(5, -5.5)->value);

        $this->assertEquals(0, Integer::compare(5, 5)->value);
        $this->assertEquals(0, Integer::compare(5, 5.0)->value);

        $this->assertLessThan(0, Integer::compare(-5, 5)->value);
        $this->assertLessThan(0, Integer::compare(-5, 5.0)->value);
        $this->assertLessThan(0, Integer::compare(-5, 5.5)->value);

        $this->assertLessThan(0, Integer::compare(5, 10)->value);
        $this->assertLessThan(0, Integer::compare(5, 10.0)->value);
        $this->assertLessThan(0, Integer::compare(5, 10.5)->value);

        $this->assertLessThan(0, Integer::compare(-5, 10)->value);
        $this->assertLessThan(0, Integer::compare(-5, 10.0)->value);
        $this->assertLessThan(0, Integer::compare(-5, 10.5)->value);
    }
}
