<?php

namespace NorseBlue\ScalarObjects\Tests\Extensions\String;

use NorseBlue\ScalarObjects\Facades\StringFacade as Str;
use NorseBlue\ScalarObjects\Tests\TestCase;

class StringRemoveTest extends TestCase
{
    /** @test */
    public function string_remove()
    {
        $this->assertEquals('foo foo  foo kal ter son', Str::remove('foo foo bar foo kal ter son', 'bar')->value);
        $this->assertEquals('bar  kal ter', Str::remove('foo foo bar foo kal ter son', ['foo', 'son'])->value);
    }
}
