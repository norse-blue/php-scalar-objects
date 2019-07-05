<?php

declare(strict_types=1);

namespace NorseBlue\ScalarObjects\Facades;

use NorseBlue\ScalarObjects\Types\BoolType;

/**
 * Facade to class BoolType.
 *
 * @method static BoolType and(bool|BoolType $value, bool|BoolType|array<bool|BoolType> ...$bools)
 * @method static BoolType create(bool|BoolType $value)
 * @method static BoolType equals(bool|BoolType $value, bool|BoolType $bool)
 * @method static BoolType not(bool|BoolType $value)
 * @method static BoolType or(bool|BoolType $value, bool|BoolType|array<bool|BoolType> ...$bools)
 * @method static BoolType xor(bool|BoolType $value, bool|BoolType|array<bool|BoolType> ...$bools)
 */
final class BoolFacade extends BaseFacade
{
    /** @var string */
    protected static $target_class = BoolType::class;
}
