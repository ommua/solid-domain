<?php


namespace Ommua\Interfaces;

use Exception;

interface SolidDomainInterface
{
    /**
     * @return EitherFailureOrSuccess
     * @throws Exception
     */
    public function __invoke(): EitherFailureOrSuccess;
}
