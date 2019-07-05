<?php

namespace NorseBlue\ScalarObjects\Tests\Extensions\String;

use NorseBlue\ScalarObjects\Facades\StringFacade as Str;
use NorseBlue\ScalarObjects\Tests\TestCase;

class StringExplodeTest extends TestCase
{
    /** @test */
    public function string_explode()
    {
        $this->assertEquals(['foo', 'bar', 'foo'], Str::explode('foo bar foo', ' '));
        $this->assertEquals(['foo', 'bar'], Str::explode('foo bar foo', ' ', -1));
    }
}
