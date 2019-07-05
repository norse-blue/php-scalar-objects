<?php

namespace NorseBlue\ScalarObjects\Tests\Extensions\String;

use NorseBlue\ScalarObjects\Facades\StringFacade as Str;
use NorseBlue\ScalarObjects\Tests\TestCase;

class StringKebabTest extends TestCase
{
    /** @test */
    public function string_kebab()
    {
        $this->assertEquals('laravel-php-framework', Str::kebab('LaravelPhpFramework')->value);
    }
}
