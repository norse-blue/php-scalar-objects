<?php

namespace NorseBlue\ScalarObjects\Tests\Types\String;

use NorseBlue\ScalarObjects\Facades\StringFacade as Str;
use NorseBlue\ScalarObjects\Tests\TestCase;
use NorseBlue\ScalarObjects\Types\IntType;
use NorseBlue\ScalarObjects\Types\StringType;

class StringEqualsTest extends TestCase
{
    /** @test */
    public function string_equals()
    {
        $this->assertFalse(Str::equals('FGHIJ', 'ABCDE')->value);
        $this->assertFalse(Str::equals('FGHIJ', new StringType('ABCDE'))->value);
        $this->assertTrue(Str::equals('FGHIJ', 'FGHIJ')->value);
        $this->assertTrue(Str::equals('FGHIJ', new StringType('FGHIJ'))->value);
        $this->assertFalse(Str::equals('FGHIJ', 'KLMNO')->value);
        $this->assertFalse(Str::equals('FGHIJ', new StringType('KLMNO'))->value);

        $this->assertFalse(Str::equals('FGHIJ', new IntType(9))->value);
    }
}
