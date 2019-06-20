<?php

namespace NorseBlue\ScalarObjects\Tests\Extensions\Scalars\Number;

use NorseBlue\ScalarObjects\Facades\NumberFacade as Number;
use NorseBlue\ScalarObjects\Tests\TestCase;

class NumberPadLeftTest extends TestCase
{
    /** @test */
    public function number_pad_left()
    {
        $this->assertEquals('9', Number::padLeft(9, 1)->value);
        $this->assertEquals('9.3', Number::padLeft(9.3, 1)->value);
        $this->assertEquals('009', Number::padLeft(9, 3)->value);
        $this->assertEquals('9.3', Number::padLeft(9.3, 3)->value);
        $this->assertEquals('0000009', Number::padLeft(9, 7)->value);
        $this->assertEquals('00009.3', Number::padLeft(9.3, 7)->value);
        $this->assertEquals('######9', Number::padLeft(9, 7, '#')->value);
        $this->assertEquals('####9.3', Number::padLeft(9.3, 7, '#')->value);
    }
}
