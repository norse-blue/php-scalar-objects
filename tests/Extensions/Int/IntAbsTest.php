<?php

namespace NorseBlue\ScalarObjects\Tests\Extensions\Int;

use NorseBlue\ScalarObjects\Facades\IntFacade as Integer;
use NorseBlue\ScalarObjects\Tests\TestCase;
use NorseBlue\ScalarObjects\Types\IntType;

class IntAbsTest extends TestCase
{
    /** @test */
    public function int_abs()
    {
        $this->assertInstanceOf(IntType::class, Integer::abs(9));
        $this->assertInstanceOf(IntType::class, Integer::abs(9.3));
        $this->assertEquals(9, Integer::abs(9)->value);
        $this->assertEquals(9, Integer::abs(-9)->value);
    }
}
