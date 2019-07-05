<?php

namespace NorseBlue\ScalarObjects\Tests\Extensions\String;

use NorseBlue\ScalarObjects\Facades\StringFacade as Str;
use NorseBlue\ScalarObjects\Tests\TestCase;

class StringAccordTest extends TestCase
{
    /** @test */
    public function string_accord()
    {
        $this->assertEquals('nothing', Str::accord(0, '%d things', 'one thing', 'nothing')->value);
        $this->assertEquals('one thing', Str::accord(1, '%d things', 'one thing', 'nothing')->value);
        $this->assertEquals('9 things', Str::accord(9, '%d things', 'one thing', 'nothing')->value);
    }
}
