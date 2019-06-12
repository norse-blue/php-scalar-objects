<?php

declare(strict_types=1);

namespace NorseBlue\ScalarObjects\Tests\Types\String;

use NorseBlue\ScalarObjects\Tests\TestCase;
use NorseBlue\ScalarObjects\Types\StringType;

class CheckValueEmptyTest extends TestCase
{
    /** @test */
    public function string_is_empty_when_value_is_empty()
    {
        $subject_empty = new StringType();
        $subject_not_empty = new StringType('not empty');

        $this->assertTrue($subject_empty->isEmpty()->value);
        $this->assertFalse($subject_not_empty->isEmpty()->value);
    }
}
