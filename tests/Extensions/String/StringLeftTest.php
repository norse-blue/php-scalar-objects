<?php

namespace NorseBlue\ScalarObjects\Tests\Extensions\String;

use NorseBlue\ScalarObjects\Facades\StringFacade as Str;
use NorseBlue\ScalarObjects\Tests\TestCase;

class StringLeftTest extends TestCase
{
    /** @test */
    public function string_left()
    {
        $this->assertEmpty(Str::left('БГДЖИЛЁ', 0)->value);
        $this->assertEmpty(Str::left('БГДЖИЛЁ', -0)->value);
        $this->assertEquals('Б', Str::left('БГДЖИЛЁ', -1)->value);
        $this->assertEquals('Б', Str::left('БГДЖИЛЁ', -1)->value);
        $this->assertEquals('БГД', Str::left('БГДЖИЛЁ', 3)->value);
        $this->assertEquals('БГД', Str::left('БГДЖИЛЁ', -3)->value);
        $this->assertEquals('БГДЖИЛЁ', Str::left('БГДЖИЛЁ', 7)->value);
        $this->assertEquals('БГДЖИЛЁ', Str::left('БГДЖИЛЁ', -7)->value);
        $this->assertEquals('БГДЖИЛЁ', Str::left('БГДЖИЛЁ', 10)->value);
        $this->assertEquals('БГДЖИЛЁ', Str::left('БГДЖИЛЁ', -10)->value);
    }
}
