<?php

declare(strict_types=1);

namespace App\Ship\Values\Casts;

use Spatie\LaravelData\Casts\Cast;
use Spatie\LaravelData\Support\DataProperty;

/**
 * Cast an array numeric into an array integer
 */
class ArrayIntegerCast implements Cast
{
    // phpcs:disable SlevomatCodingStandard.Functions.UnusedParameter.UnusedParameter
    /**
     * Cast method
     *
     * @param array<mixed> $context
     */
    public function cast(DataProperty $property, mixed $value, array $context): mixed
    {
        if (is_array($value)) {
            return array_map(function ($answer) {
                return is_numeric($answer) ? (int) $answer : $answer;
            }, $value);
        }

        return $value;
    }
}
