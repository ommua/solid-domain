<?php


namespace Ommua\Lib;


use Ommua\Interfaces\EitherFailureOrSuccess;
use Ommua\Lib\SomeTypeResponse;

abstract class AFailure implements EitherFailureOrSuccess
{
    private $errors;

    /**
     * @param callable $callError
     * @param callable $callSuccess
     * @return array
     * @throws \Exception
     */
    final public function fold(callable $callError, callable $callSuccess)
    {
        if($this->getType() === SomeTypeResponse::FAILURE) {
            return $callError($this->eitherFailureOrSuccessData());
        }

        throw new \RuntimeException("Error invoke failure status");
    }

    /**
     * IsFailure constructor.
     * @param array $errors
     */
    public function __construct(array $errors = [])
    {
        $this->errors = $errors;
    }

    /**
     * @return string
     */
    final public function getType(): string
    {
        return SomeTypeResponse::FAILURE;
    }

    /**
     * @return array
     */
    final public function eitherFailureOrSuccessData()
    {
        return $this->errors;
    }
}
