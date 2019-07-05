<?php

namespace NorseBlue\ScalarObjects\Tests\Extensions\String;

use NorseBlue\ScalarObjects\Facades\StringFacade as Str;
use NorseBlue\ScalarObjects\Tests\TestCase;
use Ramsey\Uuid\UuidInterface;

class StringUuidTest extends TestCase
{
    /** @test */
    public function string_uuid()
    {
        $this->assertInstanceOf(UuidInterface::class, Str::uuid());
        $this->assertInstanceOf(UuidInterface::class, Str::orderedUuid());
    }
}
