<?php

declare(strict_types=1);

namespace NorseBlue\ScalarObjects\Tests\Types\Bool;

use Exception;
use NorseBlue\ScalarObjects\Tests\TestCase;
use NorseBlue\ScalarObjects\Types\BoolType;
use NorseBlue\ValueObjects\Exceptions\InvalidValueException;

class CreateTypeTest extends TestCase
{
    /** @test */
    public function bool_is_created_with_default_value()
    {
        $subject = new BoolType();

        $this->assertEquals(false, $subject->value);
    }

    /** @test */
    public function bool_is_created_with_given_value()
    {
        $subject = new BoolType(true);

        $this->assertEquals(true, $subject->value);
    }

    /** @test */
    public function bool_is_created_with_given_bool_object_value()
    {
        $object = new BoolType(true);

        $subject = new BoolType($object);

        $this->assertEquals(true, $subject->value);
    }

    /** @test */
    public function bool_cannot_be_created_using_invalid_value()
    {
        try {
            $subject = new BoolType('invalid');
        } catch (Exception $e) {
            $this->assertInstanceOf(InvalidValueException::class, $e);

            return;
        }

        $this->fail(InvalidValueException::class . ' was not thrown.');
    }
}
