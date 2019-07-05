<?php

namespace NorseBlue\ScalarObjects\Tests\Extensions\String;

use NorseBlue\ScalarObjects\Facades\StringFacade as Str;
use NorseBlue\ScalarObjects\Tests\TestCase;

class StringStudlyTest extends TestCase
{
    /** @test */
    public function string_studly()
    {
        $this->assertEquals('LaravelPHPFramework', Str::studly('laravel_p_h_p_framework')->value);
        $this->assertEquals('LaravelPhpFramework', Str::studly('laravel_php_framework')->value);
        $this->assertEquals('LaravelPhPFramework', Str::studly('laravel-phP-framework')->value);
        $this->assertEquals('LaravelPhpFramework', Str::studly('laravel  -_-  php   -_-   framework   ')->value);
        $this->assertEquals('FooBar', Str::studly('fooBar')->value);
        $this->assertEquals('FooBar', Str::studly('foo_bar')->value);
        $this->assertEquals('FooBar', Str::studly('foo_bar')); // test cac->valuehe
        $this->assertEquals('FooBarBaz', Str::studly('foo-barBaz')->value);
        $this->assertEquals('FooBarBaz', Str::studly('foo-bar_baz')->value);
    }
}
