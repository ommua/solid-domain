<?php


namespace Ommua\Interfaces;


interface EitherFailureOrSuccess
{
    /**
     * Method to resolve domain or catch Exception in array errors
     * @param callable $callError func @return Array<String> error
     * @param callable $callSuccess func @retur Mixed data
     * @return mixed
     */
    public function fold(callable $callError, callable $callSuccess);

    /**
     * SomeTypeResponse status.
     * @return string | {FAILURE, ERROR}
     */
    public function getType(): string;

    /**
     * Get data failure or success.
     * @return mixed|array
     */
    public function eitherFailureOrSuccessData();
}
