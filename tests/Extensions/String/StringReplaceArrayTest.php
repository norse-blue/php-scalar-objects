<?php

namespace NorseBlue\ScalarObjects\Tests\Extensions\String;

use NorseBlue\ScalarObjects\Facades\StringFacade as Str;
use NorseBlue\ScalarObjects\Tests\TestCase;

class StringReplaceArrayTest extends TestCase
{
    /** @test */
    public function string_replace_array()
    {
        $this->assertEquals('foo/bar/baz', Str::replaceArray('?/?/?', '?', ['foo', 'bar', 'baz'])->value);
        $this->assertEquals('foo/bar/baz/?', Str::replaceArray('?/?/?/?', '?', ['foo', 'bar', 'baz'])->value);
        $this->assertEquals('foo/bar', Str::replaceArray('?/?', '?', ['foo', 'bar', 'baz'])->value);
        $this->assertEquals('?/?/?', Str::replaceArray('?/?/?', 'x', ['foo', 'bar', 'baz'])->value);
    }
}
