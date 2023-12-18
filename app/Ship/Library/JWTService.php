<?php

declare(strict_types=1);

namespace App\Ship\Library;

use Firebase\JWT\BeforeValidException;
use Firebase\JWT\ExpiredException;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Firebase\JWT\SignatureInvalidException;
use Illuminate\Auth\AuthenticationException;
use UnexpectedValueException;

/**
 * JWTService Class
 *
 * This class is used to create/decode JSON Web Tokens and verify signature
 */
class JWTService
{
    /**
     * Verify the IdToken and return decoded data
     */
    public function verify(string $idToken): mixed
    {
        try {
            $decoded = JWT::decode($idToken, new Key(config('jwt.public_key'), 'RS256'));
        } catch (SignatureInvalidException|BeforeValidException|ExpiredException|UnexpectedValueException $e) {
            throw new AuthenticationException();
        }

        $decoded = json_decode((string) json_encode($decoded), true);

        if ($decoded['aud'] !== config('jwt.audience')
            || $decoded['iss'] !== config('jwt.issuer')
            || empty($decoded['sub'])
        ) {
            throw new AuthenticationException();
        }

        return $decoded;
    }

    /**
     * Create a new Token
     */
    public function createToken(string $email): string
    {
        $currentTimestamp = time();

        $payload = [
            'iss' => config('jwt.issuer'),
            'aud' => config('jwt.audience'),
            'iat' => $currentTimestamp,
            'nbf' => $currentTimestamp,
            'exp' => $currentTimestamp + config('jwt.timeout'),
            'sub' => $email,
        ];

        return JWT::encode($payload, config('jwt.private_key'), 'RS256');
    }
}
