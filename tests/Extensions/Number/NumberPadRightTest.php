<?php

namespace NorseBlue\ScalarObjects\Tests\Extensions\Number;

use NorseBlue\ScalarObjects\Facades\NumberFacade as Number;
use NorseBlue\ScalarObjects\Tests\TestCase;

class NumberPadRightTest extends TestCase
{
    /** @test */
    public function number_pad_right()
    {
        $this->assertEquals('9', Number::padRight(9, 1)->value);
        $this->assertEquals('9.3', Number::padRight(9.3, 1)->value);
        $this->assertEquals('900', Number::padRight(9, 3)->value);
        $this->assertEquals('9.3', Number::padRight(9.3, 3)->value);
        $this->assertEquals('9000000', Number::padRight(9, 7)->value);
        $this->assertEquals('9.30000', Number::padRight(9.3, 7)->value);
        $this->assertEquals('9######', Number::padRight(9, 7, '#')->value);
        $this->assertEquals('9.3####', Number::padRight(9.3, 7, '#')->value);
    }
}
