<?php


namespace Ommua\Exceptions;


class ExceptionRequiredParam extends \Exception
{
    public const ERROR_NOT_DECLARE_PARAM = 113;

    public function __construct($message, $code = self::ERROR_NOT_DECLARE_PARAM, \Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }

    public function __toString()
    {
        return __CLASS__ . ": [{$this->code}]: {$this->message}\n";
    }
}
