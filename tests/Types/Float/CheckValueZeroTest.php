<?php

declare(strict_types=1);

namespace NorseBlue\ScalarObjects\Tests\Types\Float;

use NorseBlue\ScalarObjects\Tests\TestCase;
use NorseBlue\ScalarObjects\Types\FloatType;

class CheckValueZeroTest extends TestCase
{
    /** @test */
    public function float_is_zero_when_value_is_zero()
    {
        $subject_zero = new FloatType(0);
        $subject_not_zero = new FloatType(3.9);

        $this->assertTrue($subject_zero->isZero()->value);
        $this->assertFalse($subject_not_zero->isZero()->value);
    }
}
