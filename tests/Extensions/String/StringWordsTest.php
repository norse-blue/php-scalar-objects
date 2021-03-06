<?php

namespace NorseBlue\ScalarObjects\Tests\Extensions\String;

use NorseBlue\ScalarObjects\Facades\StringFacade as Str;
use NorseBlue\ScalarObjects\Tests\TestCase;

class StringWordsTest extends TestCase
{
    /** @test */
    public function string_can_be_limited_by_words()
    {
        $this->assertEquals('Taylor...', Str::words('Taylor Otwell', 1)->value);
        $this->assertEquals('Taylor___', Str::words('Taylor Otwell', 1, '___')->value);
        $this->assertEquals('Taylor Otwell', Str::words('Taylor Otwell', 3)->value);
    }

    /** @test */
    public function string_trimmed_only_where_necessary()
    {
        $this->assertEquals(' Taylor Otwell ', Str::words(' Taylor Otwell ', 3)->value);
        $this->assertEquals(' Taylor...', Str::words(' Taylor Otwell ', 1)->value);
    }

    /** @test */
    public function string_without_words_doesnt_produce_error()
    {
        $nbsp = chr(0xC2) . chr(0xA0);
        $this->assertEquals(' ', Str::words(' ')->value);
        $this->assertEquals($nbsp, Str::words($nbsp)->value);
    }
}
