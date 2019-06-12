<?php

declare(strict_types=1);

namespace NorseBlue\ScalarObjects\Tests\Types\Float;

use NorseBlue\ScalarObjects\Tests\TestCase;
use NorseBlue\ScalarObjects\Types\FloatType;
use NorseBlue\ScalarObjects\Types\IntType;

class ConvertValueTest extends TestCase
{
    /** @test */
    public function float_is_converted_to_int()
    {
        $object = new FloatType(3.9);

        $subject = $object->toInt();

        $this->assertInstanceOf(IntType::class, $subject);
        $this->assertEquals(3, $subject->value);
    }
}
