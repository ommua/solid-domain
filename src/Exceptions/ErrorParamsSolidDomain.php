<?php


namespace Ommua\Exceptions;


class ErrorParamsSolidDomain extends \Exception
{
    public const ERROR_TYPE_DOMAIN_PARAM = 112;

    public function __construct($message, $code = self::ERROR_TYPE_DOMAIN_PARAM, \Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }

    public function __toString()
    {
        return __CLASS__ . ": [{$this->code}]: {$this->message}\n";
    }
}
