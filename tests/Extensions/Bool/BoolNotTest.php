<?php

namespace NorseBlue\ScalarObjects\Test\Extensions\Bool;

use NorseBlue\ScalarObjects\Tests\TestCase;
use NorseBlue\ScalarObjects\Types\BoolType;

class BoolNotTest extends TestCase
{
    /** @test */
    public function bool_not()
    {
        $false = new BoolType;

        $true = $false->not();

        $this->assertFalse($false->value);
        $this->assertTrue($true->value);
        $this->assertNotSame($false, $true);
    }

    /** @test */
    public function bool_not_with_php_scalar_objects_extension_syntax()
    {
        if (!extension_loaded('scalar_objects')) return;

        $true = (false)->not();

        $this->assertTrue($true->value);
    }
}
