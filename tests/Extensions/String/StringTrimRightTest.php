<?php

namespace NorseBlue\ScalarObjects\Tests\Extensions\String;

use NorseBlue\ScalarObjects\Facades\StringFacade as Str;
use NorseBlue\ScalarObjects\Tests\TestCase;

class StringTrimRightTest extends TestCase
{
    /** @test */
    public function string_trim_right()
    {
        $this->assertEquals("\t\tThese are a few words :) ...", Str::trimRight("\t\tThese are a few words :) ...  ")->value);
        $this->assertEquals("\t\tThese are a few words :)", Str::trimRight("\t\tThese are a few words :) ...  ", " \t.")->value);
        $this->assertEquals("Hello Wor", Str::trimRight("Hello World", "Hdle")->value);
        $this->assertEquals("Hello Worl", Str::trimRight("Hello World", "HdWr")->value);

        // trim the ASCII control characters at the end (from 0 to 31 inclusive)
        $this->assertEquals("\x09Example string", Str::trimRight("\x09Example string\x0A", "\x00..\x1F")->value);
    }
}
