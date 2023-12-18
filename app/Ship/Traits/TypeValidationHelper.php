<?php

declare(strict_types=1);

namespace App\Ship\Traits;

use UnexpectedValueException;

trait TypeValidationHelper
{
    /**
     * Check if the number is increment ID
     */
    protected function validateId(?int $number): int
    {
        if (is_null($number) || $number < 1) {
            throw new UnexpectedValueException();
        }

        return $number;
    }

    /**
     * Check if the number is an integer
     */
    protected function validateInteger(?int $number): int
    {
        if (is_null($number)) {
            throw new UnexpectedValueException();
        }

        return $number;
    }
}
