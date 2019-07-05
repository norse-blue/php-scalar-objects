<?php

namespace NorseBlue\ScalarObjects\Tests\Extensions\String;

use NorseBlue\ScalarObjects\Facades\StringFacade as Str;
use NorseBlue\ScalarObjects\Tests\TestCase;

class StringSubstrTest extends TestCase
{
    /** @test */
    public function string_substr()
    {
        $this->assertEquals('Ё', Str::substr('БГДЖИЛЁ', -1)->value);
        $this->assertEquals('ЛЁ', Str::substr('БГДЖИЛЁ', -2)->value);
        $this->assertEquals('И', Str::substr('БГДЖИЛЁ', -3, 1)->value);
        $this->assertEquals('ДЖИЛ', Str::substr('БГДЖИЛЁ', 2, -1)->value);
        $this->assertEmpty(Str::substr('БГДЖИЛЁ', 4, -4)->value);
        $this->assertEquals('ИЛ', Str::substr('БГДЖИЛЁ', -3, -1)->value);
        $this->assertEquals('ГДЖИЛЁ', Str::substr('БГДЖИЛЁ', 1)->value);
        $this->assertEquals('ГДЖ', Str::substr('БГДЖИЛЁ', 1, 3)->value);
        $this->assertEquals('БГДЖ', Str::substr('БГДЖИЛЁ', 0, 4)->value);
        $this->assertEquals('Ё', Str::substr('БГДЖИЛЁ', -1, 1)->value);
        $this->assertEmpty(Str::substr('Б', 2)->value);
    }
}
