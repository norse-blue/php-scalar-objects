<?php

declare(strict_types=1);

namespace NorseBlue\ScalarObjects\Tests\Facades;

use Exception;
use NorseBlue\ObjectFacades\Exceptions\InvalidFacadeTargetClassException;
use NorseBlue\ScalarObjects\Tests\Helpers\Facades\InvalidFacade;
use NorseBlue\ScalarObjects\Tests\TestCase;

class InvalidFacadeTargetClassTest extends TestCase
{
    /** @test */
    public function throws_exception_when_an_invalid_facade_target_class_is_defined()
    {
        try {
            InvalidFacade::whatever();
        } catch (Exception $e) {
            $this->assertInstanceOf(InvalidFacadeTargetClassException::class, $e);

            return;
        }

        $this->fail(InvalidFacadeTargetClassException::class . ' was not thrown.');
    }
}
