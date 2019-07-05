<?php

namespace NorseBlue\ScalarObjects\Tests\Extensions\String;

use NorseBlue\ScalarObjects\Facades\StringFacade as Str;
use NorseBlue\ScalarObjects\Tests\TestCase;

class StringReplaceTest extends TestCase
{
    /** @test */
    public function string_replace()
    {
        $this->assertEquals('quxbar quxbar', Str::replace('foobar foobar', 'foo', 'qux')->value);
        $this->assertEquals('foo/qux? foo/qux?', Str::replace('foo/bar? foo/bar?', 'bar?', 'qux?')->value);
        $this->assertEquals('foo foo', Str::replace('foobar foobar', 'bar', '')->value);
        $this->assertEquals('foobar foobar', Str::replace('foobar foobar', 'xxx', 'yyy')->value);
        $this->assertEquals('foobar foobar', Str::replace('foobar foobar', '', 'yyy')->value);

        // Test for multibyte string support
        $this->assertEquals('Jxxxnkxxxping Malmxxx', Str::replace('Jönköping Malmö', 'ö', 'xxx')->value);
        $this->assertEquals('Jönköping Malmö', Str::replace('Jönköping Malmö', '', 'yyy')->value);
    }
}
