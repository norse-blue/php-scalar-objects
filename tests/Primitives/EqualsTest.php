<?php

declare(strict_types=1);

namespace NorseBlue\ScalarObjects\Tests\Primitives;

use NorseBlue\ScalarObjects\Tests\TestCase;
use NorseBlue\ScalarObjects\Types\BoolType;
use NorseBlue\ScalarObjects\Types\IntType;

class EqualsTest extends TestCase
{
    /** @test */
    public function primitive_equals_primitive_when_value_matches()
    {
        $subject = new IntType(1);
        $other_equal = new IntType(1);
        $other_not_equal = new IntType(3);
        $other_type = new BoolType(true);

        $this->assertTrue($subject->equals(1)->value);
        $this->assertTrue($subject->equals($other_equal)->value);
        $this->assertFalse($subject->equals(3)->value);
        $this->assertFalse($subject->equals($other_not_equal)->value);
        $this->assertFalse($subject->equals($other_type)->value);
        $this->assertFalse($other_type->equals($subject)->value);
    }
}
