<?php

namespace NorseBlue\ScalarObjects\Tests\Extensions\String;

use NorseBlue\ScalarObjects\Facades\StringFacade as Str;
use NorseBlue\ScalarObjects\Tests\TestCase;

use function NorseBlue\ScalarObjects\Functions\string;

class StringSurroundTest extends TestCase
{
    /** @test */
    public function string_surround()
    {
        $this->assertEquals('#hello world#', Str::surround('hello world', '#')->value);
        $this->assertEquals('#hello world#', Str::surround('hello world', string('#'))->value);
        $this->assertEquals('(hello world)', Str::surround('hello world', '(', ')')->value);
        $this->assertEquals('(hello world)', Str::surround('hello world', string('('), string(')'))->value);
    }
}
