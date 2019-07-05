<?php

namespace NorseBlue\ScalarObjects\Tests\Extensions\String;

use NorseBlue\ScalarObjects\Facades\StringFacade as Str;
use NorseBlue\ScalarObjects\Tests\TestCase;

class StringRepeatTest extends TestCase
{
    /** @test */
    public function string_repeat()
    {
        $this->assertEquals('', Str::repeat('')->value);
        $this->assertEquals('', Str::repeat('', 0)->value);
        $this->assertEquals('', Str::repeat('', 1)->value);
        $this->assertEquals('', Str::repeat('', 3)->value);
        $this->assertEquals('', Str::repeat('', 9)->value);

        $this->assertEquals('##', Str::repeat('#')->value);
        $this->assertEquals('', Str::repeat('#', 0)->value);
        $this->assertEquals('#', Str::repeat('#', 1)->value);
        $this->assertEquals('###', Str::repeat('#', 3)->value);
        $this->assertEquals('#########', Str::repeat('#', 9)->value);
    }
}
