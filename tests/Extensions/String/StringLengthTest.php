<?php

namespace NorseBlue\ScalarObjects\Tests\Extensions\String;

use NorseBlue\ScalarObjects\Facades\StringFacade as Str;
use NorseBlue\ScalarObjects\Tests\TestCase;
use NorseBlue\ScalarObjects\Types\StringType;

class StringLengthTest extends TestCase
{
    /** @test */
    public function string_length()
    {
        $this->assertEquals(11, Str::length('foo bar baz')->value);
        $this->assertEquals(11, Str::length('foo bar baz', 'UTF-8')->value);
        $this->assertEquals(15, Str::length('Jönköping Malmö')->value);
        $this->assertEquals(15, Str::length('Jönköping Malmö', 'UTF-8')->value);
    }

    /** @test */
    public function string_count()
    {
        $this->assertCount(11, new StringType('foo bar baz'));
        $this->assertCount(15, new StringType('Jönköping Malmö'));
    }
}
