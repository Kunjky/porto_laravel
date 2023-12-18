<?php

declare(strict_types=1);

return [
    'public_key' => file_get_contents(env('JWT_PUBLIC_KEY')),
    'private_key' => file_get_contents(env('JWT_PRIVATE_KEY')),
    'issuer' => env('JWT_ISSUER'),
    'audience' => env('JWT_AUDIENCE'),
    'timeout' => env('JWT_TIMEOUT'),
];
