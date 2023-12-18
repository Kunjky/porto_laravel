<?php

declare(strict_types=1);

namespace App\SectionApp\UserContainer\Values;

use App\Ship\Models\User;
use App\Ship\Values\BaseValue;
use Spatie\LaravelData\Attributes\Validation\Email;
use Spatie\LaravelData\Attributes\Validation\Unique;

/**
 * User representation
 */
class CreateUserValue extends BaseValue
{
    /**
     * Class constructor
     */
    public function __construct(
        #[Email,
            Unique(User::class)]
        public string $email,
        public string $name,
        public string $password
    ) {
    }
}
