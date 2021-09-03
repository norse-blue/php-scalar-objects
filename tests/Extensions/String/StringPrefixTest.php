<?php

namespace NorseBlue\ScalarObjects\Tests\Extensions\String;

use NorseBlue\ScalarObjects\Facades\StringFacade as Str;
use NorseBlue\ScalarObjects\Tests\TestCase;

use function NorseBlue\ScalarObjects\Functions\string;

class StringPrefixTest extends TestCase
{
    /** @test */
    public function string_prefix()
    {
        $this->assertEquals('hello world', Str::prefix('world', 'hello ')->value);
        $this->assertEquals('hello world', Str::prefix('world', string('hello '))->value);
    }
}
