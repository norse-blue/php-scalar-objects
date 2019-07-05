<?php

namespace NorseBlue\ScalarObjects\Tests\Extensions\String;

use NorseBlue\ScalarObjects\Facades\StringFacade as Str;
use NorseBlue\ScalarObjects\Tests\TestCase;

class StringFinishTest extends TestCase
{
    /** @test */
    public function string_finish()
    {
        $this->assertEquals('abbc', Str::finish('ab', 'bc')->value);
        $this->assertEquals('abbc', Str::finish('abbcbc', 'bc')->value);
        $this->assertEquals('abcbbc', Str::finish('abcbbcbc', 'bc')->value);
    }
}
