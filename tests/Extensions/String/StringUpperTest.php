<?php

namespace NorseBlue\ScalarObjects\Tests\Extensions\String;

use NorseBlue\ScalarObjects\Facades\StringFacade as Str;
use NorseBlue\ScalarObjects\Tests\TestCase;

class StringUpperTest extends TestCase
{
    /** @test */
    public function string_upper()
    {
        $this->assertEquals('FOO BAR BAZ', Str::upper('foo bar baz')->value);
        $this->assertEquals('FOO BAR BAZ', Str::upper('foO bAr BaZ')->value);
    }
}
