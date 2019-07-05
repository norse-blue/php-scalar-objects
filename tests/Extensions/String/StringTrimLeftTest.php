<?php

namespace NorseBlue\ScalarObjects\Tests\Extensions\String;

use NorseBlue\ScalarObjects\Facades\StringFacade as Str;
use NorseBlue\ScalarObjects\Tests\TestCase;

class StringTrimLeftTest extends TestCase
{
    /** @test */
    public function string_trim_left()
    {
        $this->assertEquals("These are a few words :) ...  ", Str::trimLeft("\t\tThese are a few words :) ...  ")->value);
        $this->assertEquals("These are a few words :) ...  ", Str::trimLeft("\t\tThese are a few words :) ...  ", " \t.")->value);
        $this->assertEquals("o World", Str::trimLeft("Hello World", "Hdle")->value);
        $this->assertEquals("ello World", Str::trimLeft("Hello World", "HdWr")->value);

        // trim the ASCII control characters at the beginning (from 0 to 31 inclusive)
        $this->assertEquals("Example string\x0A", Str::trimLeft("\x09Example string\x0A", "\x00..\x1F")->value);
    }
}
