<?php

namespace NorseBlue\ScalarObjects\Tests\Extensions\String;

use NorseBlue\ScalarObjects\Facades\StringFacade as Str;
use NorseBlue\ScalarObjects\Tests\TestCase;

class StringReplaceFirstTest extends TestCase
{
    /** @test */
    public function string_replace_first()
    {
        $this->assertEquals('fooqux foobar', Str::replaceFirst('foobar foobar', 'bar', 'qux')->value);
        $this->assertEquals('foo/qux? foo/bar?', Str::replaceFirst('foo/bar? foo/bar?', 'bar?', 'qux?')->value);
        $this->assertEquals('foo foobar', Str::replaceFirst('foobar foobar', 'bar', '')->value);
        $this->assertEquals('foobar foobar', Str::replaceFirst('foobar foobar', 'xxx', 'yyy')->value);
        $this->assertEquals('foobar foobar', Str::replaceFirst('foobar foobar', '', 'yyy')->value);

        // Test for multibyte string support
        $this->assertEquals('Jxxxnköping Malmö', Str::replaceFirst('Jönköping Malmö', 'ö', 'xxx')->value);
        $this->assertEquals('Jönköping Malmö', Str::replaceFirst('Jönköping Malmö', '', 'yyy')->value);
    }
}
