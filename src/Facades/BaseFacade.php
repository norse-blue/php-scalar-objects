<?php

declare(strict_types=1);

namespace NorseBlue\ScalarObjects\Facades;

use NorseBlue\ObjectFacades\Exceptions\InvalidFacadeTargetClassException;
use NorseBlue\ObjectFacades\Facade;
use NorseBlue\ValueObjects\ValueObject;

abstract class BaseFacade extends Facade
{
    /** @inheritDoc */
    protected static $target_class = ValueObject::class;

    protected static function enforceFacadeTargetClassType(string $class): void
    {
        if (!is_subclass_of($class, self::$target_class)) {
            throw new InvalidFacadeTargetClassException(
                sprintf('The class "%s" does not extend class "%s".', $class, self::$target_class)
            );
        }
    }
}
