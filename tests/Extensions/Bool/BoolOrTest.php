<?php

namespace NorseBlue\ScalarObjects\Test\Extensions\Bool;

use NorseBlue\ScalarObjects\Tests\TestCase;
use NorseBlue\ScalarObjects\Types\BoolType;

class BoolOrTest extends TestCase
{
    /** @test */
    public function bool_or()
    {
        $false = new BoolType();
        $true = new BoolType(true);

        $this->assertFalse($false->or(false)->value);
        $this->assertTrue($false->or(true)->value);
        $this->assertTrue($true->or(false)->value);
        $this->assertTrue($true->or(true)->value);

        $this->assertFalse($false->or(false, false, false)->value);
        $this->assertTrue($false->or(false, true, false)->value);
        $this->assertTrue($false->or(true, false, true)->value);
        $this->assertTrue($false->or(true, true, true)->value);

        $this->assertTrue($true->or(false, false, false)->value);
        $this->assertTrue($true->or(false, true, false)->value);
        $this->assertTrue($true->or(true, false, true)->value);
        $this->assertTrue($true->or(true, true, true)->value);

        $this->assertFalse($false->or([false, false, false])->value);
        $this->assertTrue($false->or([false, true, false])->value);
        $this->assertTrue($false->or([true, false, true])->value);
        $this->assertTrue($false->or([true, true, true])->value);

        $this->assertTrue($true->or([false, false, false])->value);
        $this->assertTrue($true->or([false, true, false])->value);
        $this->assertTrue($true->or([true, false, true])->value);
        $this->assertTrue($true->or([true, true, true])->value);
    }
}
