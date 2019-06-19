<?php

declare(strict_types=1);

namespace NorseBlue\Prim;

use NorseBlue\ScalarObjects\Types\BoolType;
use NorseBlue\ScalarObjects\Types\FloatType;
use NorseBlue\ScalarObjects\Types\IntType;
use NorseBlue\ScalarObjects\Types\NumberType;
use NorseBlue\ScalarObjects\Types\StringType;
use Symfony\Component\Finder\Finder;
use function NorseBlue\ScalarObjects\Functions\path_merge;

/**
 * @codeCoverageIgnore
 */
(static function (): void {
    $extensible_classes = [
        BoolType::class,
        FloatType::class,
        IntType::class,
        NumberType::class,
        StringType::class,
    ];

    foreach ($extensible_classes as $class) {
        $pattern = '%^NorseBlue\\\\ScalarObjects\\\\Types\\\\(?<type>\w+?)(?:Type)?$%';
        if (!preg_match($pattern, $class, $data)) {
            continue;
        }

        $type = $data['type'];
        $extensions_path = path_merge(__DIR__, ['Extensions', $type]);
        if (!is_dir($extensions_path)) {
            continue;
        }

        $extensions = array_keys(
            iterator_to_array(
                Finder::create()
                    ->in($extensions_path)
                    ->name("{$type}*Extension.php")
                    ->files()
            )
        );

        foreach ($extensions as $path) {
            $pattern = '%^' . path_merge($extensions_path, $type) . '(.+)Extension\.php$%';
            $name = preg_replace($pattern, '\1', $path);
            $extension = path_merge(
                'NorseBlue\ScalarObjects',
                [
                    'Extensions',
                    $type,
                    "{$type}{$name}Extension",
                ],
                '\\'
            );

            $class::registerExtensionMethod(lcfirst($name), $extension);
        }
    }
})();
