<?php

namespace NorseBlue\ScalarObjects\Tests\Extensions\String;

use NorseBlue\ScalarObjects\Facades\StringFacade as Str;
use NorseBlue\ScalarObjects\Tests\TestCase;

class StringBeforeTest extends TestCase
{
    /** @test */
    public function string_before()
    {
        $this->assertEquals('han', Str::before('hannah', 'nah')->value);
        $this->assertEquals('ha', Str::before('hannah', 'n')->value);
        $this->assertEquals('ééé ', Str::before('ééé hannah', 'han')->value);
        $this->assertEquals('hannah', Str::before('hannah', 'xxxx')->value);
        $this->assertEquals('hannah', Str::before('hannah', '')->value);
        $this->assertEquals('han', Str::before('han0nah', '0')->value);
    }
}
