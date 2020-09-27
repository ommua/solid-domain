<?php


namespace Ommua;


use Ommua\Exceptions\ExceptionErrorInvokeDomain;
use Ommua\Traits\InvokeDomain;
use Ommua\Interfaces\EitherFailureOrSuccess;
use Ommua\Interfaces\SolidDomainInterface;

abstract class SolidDomain implements SolidDomainInterface
{
    /**
     * @method trait resolve domain invoke
     */
    use  InvokeDomain;

    /**
     * @return EitherFailureOrSuccess
     * @throws ExceptionErrorInvokeDomain
     */
    public function __invoke(): EitherFailureOrSuccess {
        return $this->_invokeDomain(func_get_args());
    }
}
