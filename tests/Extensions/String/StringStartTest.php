<?php

namespace NorseBlue\ScalarObjects\Tests\Extensions\String;

use NorseBlue\ScalarObjects\Facades\StringFacade as Str;
use NorseBlue\ScalarObjects\Tests\TestCase;

class StringStartTest extends TestCase
{
    /** @test */
    public function string_start()
    {
        $this->assertEquals('/test/string', Str::start('test/string', '/')->value);
        $this->assertEquals('/test/string', Str::start('/test/string', '/')->value);
        $this->assertEquals('/test/string', Str::start('//test/string', '/')->value);
    }
}
