<?php

namespace NorseBlue\ScalarObjects\Tests\Extensions\String;

use NorseBlue\ScalarObjects\Facades\StringFacade as Str;
use NorseBlue\ScalarObjects\Tests\TestCase;
use NorseBlue\ScalarObjects\Types\StringType;

class StringRandomTest extends TestCase
{
    /** @test */
    public function string_random()
    {
        $this->assertEquals(16, strlen(Str::random()));
        $randomInteger = random_int(1, 100);
        $this->assertEquals($randomInteger, strlen(Str::random($randomInteger)));
        $this->assertInstanceOf(StringType::class, Str::random());
    }
}
