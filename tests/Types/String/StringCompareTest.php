<?php

namespace NorseBlue\ScalarObjects\Tests\Types\String;

use NorseBlue\ScalarObjects\Facades\StringFacade as Str;
use NorseBlue\ScalarObjects\Tests\TestCase;
use NorseBlue\ScalarObjects\Types\StringType;

class StringCompareTest extends TestCase
{
    /** @test */
    public function string_compare()
    {
        $this->assertGreaterThan(0, Str::compare('FGHIJ', 'ABCDE')->value);
        $this->assertGreaterThan(0, Str::compare('FGHIJ', new StringType('ABCDE'))->value);
        $this->assertEquals(0, Str::compare('FGHIJ', 'FGHIJ')->value);
        $this->assertEquals(0, Str::compare('FGHIJ', new StringType('FGHIJ'))->value);
        $this->assertLessThan(0, Str::compare('FGHIJ', 'KLMNO')->value);
        $this->assertLessThan(0, Str::compare('FGHIJ', new StringType('KLMNO'))->value);
    }
}
