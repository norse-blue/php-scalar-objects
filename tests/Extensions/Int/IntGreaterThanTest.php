<?php

namespace NorseBlue\ScalarObjects\Tests\Extensions\Scalars\Int;

use NorseBlue\ScalarObjects\Facades\IntFacade as Integer;
use NorseBlue\ScalarObjects\Tests\TestCase;

class IntGreaterThanTest extends TestCase
{
    /** @test */
    public function int_greater_than()
    {
        $this->assertFalse(Integer::greaterThan(3, 9)->value);
        $this->assertFalse(Integer::greaterThan(3, 9.1)->value);
        $this->assertTrue(Integer::greaterThan(9, 3)->value);
        $this->assertTrue(Integer::greaterThan(9, 3.1)->value);
        $this->assertFalse(Integer::greaterThan(3, 3)->value);
        $this->assertTrue(Integer::greaterThan(3, 2.9)->value);
        $this->assertFalse(Integer::greaterThan(3, 3.0)->value);
        $this->assertFalse(Integer::greaterThan(3, 3.1)->value);
        $this->assertTrue(Integer::greaterThan(3, -9)->value);
        $this->assertTrue(Integer::greaterThan(3, -9.1)->value);
        $this->assertFalse(Integer::greaterThan(-3, 9)->value);
        $this->assertFalse(Integer::greaterThan(-3, 9.1)->value);
    }
}
