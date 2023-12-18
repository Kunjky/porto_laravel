<?php

declare(strict_types=1);

namespace App\SectionApp\UserContainer\Values;

use App\Ship\Values\BaseValue;

/**
 * UserCredential representation
 */
class UserCredentialValue extends BaseValue
{
    /**
     * Class constructor
     */
    public function __construct(
        public string $email,
        public string $password
    ) {
    }
}
