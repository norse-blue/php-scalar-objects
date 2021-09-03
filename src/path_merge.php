<?php

declare(strict_types=1);

namespace NorseBlue\ScalarObjects;

/**
 * Merge the path segments to the base path.
 *
 * @param string|array<string> $segments
 *
 * @codeCoverageIgnore
 */
function path_merge(
    string $base,
    string|array $segments,
    string $separator = DIRECTORY_SEPARATOR,
    bool $trailing_separator = false
): string {
    $path = rtrim($base, $separator);

    if (! is_array($segments)) {
        $segments = [$segments];
    }

    foreach ($segments as $segment) {
        $path .= $separator . $segment;
    }

    $path = rtrim($path, $separator);

    return $path . ($trailing_separator ? $separator : '');
}
