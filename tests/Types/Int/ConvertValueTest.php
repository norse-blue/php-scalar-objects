<?php

declare(strict_types=1);

namespace NorseBlue\ScalarObjects\Tests\Types\Int;

use NorseBlue\ScalarObjects\Tests\TestCase;
use NorseBlue\ScalarObjects\Types\FloatType;
use NorseBlue\ScalarObjects\Types\IntType;

class ConvertValueTest extends TestCase
{
    /** @test */
    public function float_is_converted_to_int()
    {
        $object = new IntType(3);

        $subject = $object->toFloat();

        $this->assertInstanceOf(FloatType::class, $subject);
        $this->assertEquals(3.0, $subject->value);
    }
}
