<?php

namespace NorseBlue\ScalarObjects\Tests\Extensions\String;

use NorseBlue\ScalarObjects\Facades\StringFacade as Str;
use NorseBlue\ScalarObjects\Tests\TestCase;

class StringContainsTest extends TestCase
{
    /** @test */
    public function string_contains()
    {
        $this->assertTrue(Str::contains('taylor', 'ylo')->value);
        $this->assertTrue(Str::contains('taylor', 'taylor')->value);
        $this->assertTrue(Str::contains('taylor', ['ylo'])->value);
        $this->assertTrue(Str::contains('taylor', ['xxx', 'ylo'])->value);
        $this->assertFalse(Str::contains('taylor', 'xxx')->value);
        $this->assertFalse(Str::contains('taylor', ['xxx'])->value);
        $this->assertFalse(Str::contains('taylor', '')->value);
    }
}
