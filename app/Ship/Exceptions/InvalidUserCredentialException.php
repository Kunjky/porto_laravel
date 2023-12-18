<?php

declare(strict_types=1);

namespace App\Ship\Exceptions;

use Exception;

/**
 * InvalidUserCredentialException class
 *
 * Exception thrown when user credential is invalid
 */
class InvalidUserCredentialException extends Exception
{
    /**
     * Message
     *
     * @var string
     */
    protected $message = 'Invalid credential!';
}
