<?php

namespace NorseBlue\ScalarObjects\Tests\Extensions\Number;

use NorseBlue\ScalarObjects\Facades\NumberFacade as Number;
use NorseBlue\ScalarObjects\Tests\TestCase;

class NumberPadTest extends TestCase
{
    /** @test */
    public function number_pad()
    {
        $this->assertEquals('9', Number::pad(9, 1)->value);
        $this->assertEquals('9.3', Number::pad(9.3, 1)->value);
        $this->assertEquals('090', Number::pad(9, 3)->value);
        $this->assertEquals('9.3', Number::pad(9.3, 3)->value);
        $this->assertEquals('0009000', Number::pad(9, 7)->value);
        $this->assertEquals('009.300', Number::pad(9.3, 7)->value);
        $this->assertEquals('###9###', Number::pad(9, 7, '#')->value);
        $this->assertEquals('##9.3##', Number::pad(9.3, 7, '#')->value);
        $this->assertEquals('009', Number::pad(9, 3, '0', STR_PAD_LEFT)->value);
        $this->assertEquals('9.3', Number::pad(9.3, 3, '0', STR_PAD_LEFT)->value);
        $this->assertEquals('900', Number::pad(9, 3, '0', STR_PAD_RIGHT)->value);
        $this->assertEquals('9.3', Number::pad(9.3, 3, '0', STR_PAD_RIGHT)->value);
    }
}
