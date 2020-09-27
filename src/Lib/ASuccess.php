<?php


namespace Ommua\Lib;


use Ommua\Interfaces\EitherFailureOrSuccess;
use Ommua\Lib\SomeTypeResponse;

abstract class ASuccess implements EitherFailureOrSuccess
{
    private $data;

    /**
     * @param callable $callError
     * @param callable $callSuccess
     * @return callable
     */
    final public function fold(callable $callError, callable $callSuccess)
    {
        if($this->getType() === SomeTypeResponse::SUCCESS) {
            return $callSuccess($this->eitherFailureOrSuccessData());
        }

        throw new \RuntimeException("Error invoke failure status");
    }

    /**
     * ASuccess constructor.
     * @param $data
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * @return string
     */
    final public function getType(): string
    {
        return SomeTypeResponse::SUCCESS;
    }

    /**
     * @return mixed
     */
    final public function eitherFailureOrSuccessData()
    {
        return $this->data;
    }
}
