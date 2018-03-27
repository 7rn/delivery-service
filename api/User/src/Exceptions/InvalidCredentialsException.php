<?php
/**
 * InvalidCredentialsException.php
 * Created by @anonymoussc on 03/25/2018 9:28 PM.
 */

namespace Api\User\Exceptions;

use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;

class InvalidCredentialsException extends UnauthorizedHttpException
{
    public function __construct($message = null, \Exception $previous = null, $code = 0)
    {
        parent::__construct('', $message, $previous, $code);
    }
}