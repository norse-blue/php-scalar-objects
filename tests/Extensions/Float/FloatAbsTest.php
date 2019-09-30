<?php

namespace NorseBlue\ScalarObjects\Tests\Extensions\Float;

use NorseBlue\ScalarObjects\Facades\FloatFacade as Flt;
use NorseBlue\ScalarObjects\Tests\TestCase;
use NorseBlue\ScalarObjects\Types\FloatType;
use NorseBlue\ScalarObjects\Types\IntType;

class FloatAbsTest extends TestCase
{
    /** @test */
    public function float_abs()
    {
        $this->assertInstanceOf(FloatType::class, Flt::abs(9));
        $this->assertInstanceOf(FloatType::class, Flt::abs(9.3));
        $this->assertEquals(9, Flt::abs(9)->value);
        $this->assertEquals(9.0, Flt::abs(9.0)->value);
        $this->assertEquals(9, Flt::abs(9)->value);
        $this->assertEquals(9.0, Flt::abs(-9.0)->value);
    }

    /** @test */
    public function float_abs_with_php_scalar_objects_extension_syntax()
    {
        if (!extension_loaded('scalar_objects')) return;

        $this->assertInstanceOf(IntType::class, (9)->abs());
        $this->assertInstanceOf(FloatType::class, (9.3)->abs());
        $this->assertEquals(9, (9)->abs()->value);
        $this->assertEquals(9.0, (9.0)->abs()->value);
        $this->assertEquals(9, (9)->abs()->value);
        $this->assertEquals(9.0, (-9.0)->abs()->value);
    }
}
