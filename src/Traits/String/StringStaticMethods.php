<?php

declare(strict_types=1);

namespace NorseBlue\ScalarObjects\Traits\String;

use NorseBlue\ScalarObjects\Types\IntType;
use NorseBlue\ScalarObjects\Types\StringType;
use Ramsey\Uuid\Codec\TimestampFirstCombCodec;
use Ramsey\Uuid\Generator\CombGenerator;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidFactory;
use Ramsey\Uuid\UuidInterface;
use function NorseBlue\ScalarObjects\Functions\string;

trait StringStaticMethods
{
    /**
     * Create a string from a number.
     * You can provide a %d placeholder to insert the actual count into the final string.
     *
     * @param int|IntType $count
     * @param string|StringType $many
     * @param string|StringType $one
     * @param string|StringType|null $zero
     *
     * @return \NorseBlue\ScalarObjects\Types\StringType
     */
    public static function accord($count, $many, $one, $zero = null): StringType
    {
        $count = IntType::unwrap($count);
        $zero = self::unwrap($zero);

        if ($count === 1) {
            $output = $one;
        } else {
            if ($count === 0 and $zero !== '') {
                $output = $zero;
            } else {
                $output = $many;
            }
        }

        return string(sprintf($output, $count));
    }

    /**
     * Generate a time-ordered UUID (version 4).
     *
     * @return \Ramsey\Uuid\UuidInterface
     *
     * @throws \Exception
     */
    public static function orderedUuid(): UuidInterface
    {
        $factory = new UuidFactory();

        $factory->setRandomGenerator(
            new CombGenerator(
                $factory->getRandomGenerator(),
                $factory->getNumberConverter()
            )
        );

        $factory->setCodec(
            new TimestampFirstCombCodec(
                $factory->getUuidBuilder()
            )
        );

        return $factory->uuid4();
    }

    /**
     * Generate a more truly "random" alpha-numeric string.
     *
     * @param int|IntType $length
     *
     * @return \NorseBlue\ScalarObjects\Types\StringType
     *
     * @throws \Exception
     */
    public static function random($length = 16): StringType
    {
        $string = '';
        $length = IntType::unwrap($length);

        while (($len = strlen($string)) < $length) {
            $size = $length - $len;

            $bytes = random_bytes($size);

            $string .= substr(str_replace(['/', '+', '='], '', base64_encode($bytes)), 0, $size);
        }

        return string($string);
    }

    /**
     * Generate a UUID (version 4).
     *
     * @return \Ramsey\Uuid\UuidInterface
     *
     * @throws \Exception
     */
    public static function uuid(): UuidInterface
    {
        return Uuid::uuid4();
    }
}
