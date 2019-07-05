<?php

namespace NorseBlue\ScalarObjects\Tests\Extensions\String;

use NorseBlue\ScalarObjects\Facades\StringFacade as Str;
use NorseBlue\ScalarObjects\Tests\TestCase;

class StringTitleTest extends TestCase
{
    /** @test */
    public function string_title()
    {
        $this->assertEquals('Jefferson Costella', Str::title('jefferson costella')->value);
        $this->assertEquals('Jefferson Costella', Str::title('jefFErson coSTella')->value);
    }
}
