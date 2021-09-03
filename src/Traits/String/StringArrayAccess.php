<?php

declare(strict_types=1);

namespace NorseBlue\ScalarObjects\Traits\String;

use NorseBlue\ValueObjects\Exceptions\ImmutableValueObjectException;
use OutOfBoundsException;

/**
 * Implements the ArrayAccess interface for string objects.
 */
trait StringArrayAccess
{
    /**
     * Whether a offset exists
     *
     * @param mixed $offset
     *
     * @link https://php.net/manual/en/arrayaccess.offsetexists.php
     */
    public function offsetExists($offset): bool
    {
        return $this->length()->greaterThanOrEqual($offset + 1)->value;
    }

    /**
     * Offset to retrieve
     *
     * @param mixed $offset
     *
     * @return mixed Can return all value types.
     *
     * @link https://php.net/manual/en/arrayaccess.offsetget.php
     */
    public function offsetGet($offset): mixed
    {
        if (! $this->offsetExists($offset)) {
            throw new OutOfBoundsException('The given index does not exist.');
        }

        return $this->substr($offset, 1);
    }

    /**
     * Offset to set
     *
     * @param mixed $offset
     * @param mixed $value
     *
     * @link https://php.net/manual/en/arrayaccess.offsetset.php
     */
    public function offsetSet($offset, $value): void
    {
        throw new ImmutableValueObjectException('The string is immutable, cannot set offset.');
    }

    /**
     * Offset to unset
     *
     * @param mixed $offset
     *
     * @link https://php.net/manual/en/arrayaccess.offsetunset.php
     */
    public function offsetUnset($offset): void
    {
        throw new ImmutableValueObjectException('The string is immutable, cannot unset offset.');
    }
}
