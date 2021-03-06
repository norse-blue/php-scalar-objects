<?php

namespace NorseBlue\ScalarObjects\Tests\Extensions\String;

use NorseBlue\ScalarObjects\Facades\StringFacade as Str;
use NorseBlue\ScalarObjects\Tests\TestCase;

/**
 * @see https://github.com/php/php-src/blob/master/ext/filter/tests/056.phpt
 */
class StringIsHostnameTest extends TestCase
{
    /** @test */
    public function string_is_hostname()
    {
        $this->assertFalse(Str::isHostname('_example.com')->value);
        $this->assertFalse(Str::isHostname('test_.example.com')->value);
        $this->assertFalse(Str::isHostname('te_st.example.com')->value);
        $this->assertFalse(Str::isHostname('test._example.com')->value);
    }
}
