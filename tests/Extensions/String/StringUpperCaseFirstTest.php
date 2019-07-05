<?php

namespace NorseBlue\ScalarObjects\Tests\Extensions\String;

use NorseBlue\ScalarObjects\Facades\StringFacade as Str;
use NorseBlue\ScalarObjects\Tests\TestCase;

class StringUpperCaseFirstTest extends TestCase
{
    /** @test */
    public function string_upper_case_first()
    {
        $this->assertEquals('Laravel', Str::upperCaseFirst('laravel')->value);
        $this->assertEquals('Laravel framework', Str::upperCaseFirst('laravel framework')->value);
        $this->assertEquals('Мама', Str::upperCaseFirst('мама')->value);
        $this->assertEquals('Мама мыла раму', Str::upperCaseFirst('мама мыла раму')->value);
    }
}
