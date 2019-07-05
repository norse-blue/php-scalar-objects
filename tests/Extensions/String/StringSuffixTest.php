<?php

namespace NorseBlue\ScalarObjects\Tests\Extensions\String;

use NorseBlue\ScalarObjects\Facades\StringFacade as Str;
use NorseBlue\ScalarObjects\Tests\TestCase;
use function NorseBlue\ScalarObjects\Functions\string;

class StringSuffixTest extends TestCase
{
    /** @test */
    public function string_suffix()
    {
        $this->assertEquals('hello world', Str::suffix('hello', ' world')->value);
        $this->assertEquals('hello world', Str::suffix('hello', string(' world'))->value);
    }
}
