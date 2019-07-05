<?php

namespace NorseBlue\ScalarObjects\Tests\Extensions\String;

use NorseBlue\ScalarObjects\Facades\StringFacade as Str;
use NorseBlue\ScalarObjects\Tests\TestCase;

class StringToggleTest extends TestCase
{
    /** @test */
    public function string_toggle()
    {
        $this->assertEquals('one', Str::toggle('', ['one', 'two', 'three'])->value);
        $this->assertEquals('', Str::toggle('', ['one', 'two', 'three'], true)->value);
        $this->assertEquals('two', Str::toggle('one', ['one', 'two', 'three'], true)->value);
        $this->assertEquals('two', Str::toggle('one', ['one', 'two', 'three'])->value);
        $this->assertEquals('three', Str::toggle('two', ['one', 'two', 'three'])->value);
        $this->assertEquals('one', Str::toggle('three', ['one', 'two', 'three'])->value);
    }
}
