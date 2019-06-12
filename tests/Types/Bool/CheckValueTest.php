<?php

declare(strict_types=1);

namespace NorseBlue\ScalarObjects\Tests\Types\Bool;

use NorseBlue\ScalarObjects\Tests\TestCase;
use NorseBlue\ScalarObjects\Types\BoolType;

class CheckValueTest extends TestCase
{
    /** @test */
    public function bool_is_false_when_value_is_false()
    {
        $subject = new BoolType(false);

        $this->assertTrue($subject->isFalse());
        $this->assertFalse($subject->isTrue());
    }

    /** @test */
    public function bool_is_true_when_value_is_true()
    {
        $subject = new BoolType(true);

        $this->assertTrue($subject->isTrue());
        $this->assertFalse($subject->isFalse());
    }
}
