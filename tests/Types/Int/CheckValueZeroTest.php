<?php

declare(strict_types=1);

namespace NorseBlue\ScalarObjects\Tests\Types\Int;

use NorseBlue\ScalarObjects\Tests\TestCase;
use NorseBlue\ScalarObjects\Types\IntType;

class CheckValueZeroTest extends TestCase
{
    /** @test */
    public function int_is_zero_when_value_is_zero()
    {
        $subject_zero = new IntType(0);
        $subject_not_zero = new IntType(3.9);

        $this->assertTrue($subject_zero->isZero()->value);
        $this->assertFalse($subject_not_zero->isZero()->value);
    }
}
