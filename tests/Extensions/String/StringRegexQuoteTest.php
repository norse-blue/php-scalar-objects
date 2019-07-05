<?php

namespace NorseBlue\ScalarObjects\Tests\Extensions\String;

use NorseBlue\ScalarObjects\Facades\StringFacade as Str;
use NorseBlue\ScalarObjects\Tests\TestCase;

class StringRegexQuoteTest extends TestCase
{
    /** @test */
    public function string_matches()
    {
        $this->assertEquals('', Str::regexQuote('')->value);
        $this->assertEquals('\#\^this is a string\$\#', Str::regexQuote('#^this is a string$#')->value);
        $this->assertEquals('\#\^this is a string\$\#', Str::regexQuote('#^this is a string$#', '%')->value);
        $this->assertEquals('\%\^this is a string\$\%', Str::regexQuote('%^this is a string$%', '%')->value);
    }
}
