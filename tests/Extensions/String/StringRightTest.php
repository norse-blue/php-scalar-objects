<?php

namespace NorseBlue\ScalarObjects\Tests\Extensions\String;

use NorseBlue\ScalarObjects\Facades\StringFacade as Str;
use NorseBlue\ScalarObjects\Tests\TestCase;

class StringRightTest extends TestCase
{
    /** @test */
    public function string_right()
    {
        $this->assertEmpty(Str::right('БГДЖИЛЁ', 0)->value);
        $this->assertEmpty(Str::right('БГДЖИЛЁ', -0)->value);
        $this->assertEquals('Ё', Str::right('БГДЖИЛЁ', -1)->value);
        $this->assertEquals('Ё', Str::right('БГДЖИЛЁ', -1)->value);
        $this->assertEquals('ИЛЁ', Str::right('БГДЖИЛЁ', 3)->value);
        $this->assertEquals('ИЛЁ', Str::right('БГДЖИЛЁ', -3)->value);
        $this->assertEquals('БГДЖИЛЁ', Str::right('БГДЖИЛЁ', 7)->value);
        $this->assertEquals('БГДЖИЛЁ', Str::right('БГДЖИЛЁ', -7)->value);
        $this->assertEquals('БГДЖИЛЁ', Str::right('БГДЖИЛЁ', 10)->value);
        $this->assertEquals('БГДЖИЛЁ', Str::right('БГДЖИЛЁ', -10)->value);
    }
}
