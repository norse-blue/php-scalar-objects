<?php

namespace NorseBlue\ScalarObjects\Tests\Extensions\String;

use NorseBlue\ScalarObjects\Facades\StringFacade as Str;
use NorseBlue\ScalarObjects\Tests\TestCase;

class StringLowerCaseFirstTest extends TestCase
{
    /** @test */
    public function string_lower_case_first()
    {
        $this->assertEquals('laravel', Str::lowerCaseFirst('Laravel')->value);
        $this->assertEquals('laravel Framework', Str::lowerCaseFirst('Laravel Framework')->value);
        $this->assertEquals('mама', Str::lowerCaseFirst('Mама')->value);
        $this->assertEquals('mама Mыла Pаму', Str::lowerCaseFirst('Mама Mыла Pаму')->value);
    }
}
