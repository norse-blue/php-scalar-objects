<?php

namespace NorseBlue\ScalarObjects\Tests\Extensions\String;

use NorseBlue\ScalarObjects\Facades\StringFacade as Str;
use NorseBlue\ScalarObjects\Tests\TestCase;

class StringLowerTest extends TestCase
{
    /** @test */
    public function string_lower()
    {
        $this->assertEquals('foo bar baz', Str::lower('FOO BAR BAZ')->value);
        $this->assertEquals('foo bar baz', Str::lower('fOo Bar bAz')->value);
    }
}
