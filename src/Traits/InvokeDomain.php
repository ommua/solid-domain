<?php


namespace Ommua\Traits;

use Ommua\Exceptions\ExceptionErrorInvokeDomain;
use Ommua\Interfaces\EitherFailureOrSuccess;

trait InvokeDomain
{
    private $HANDLER_METHOD_INVOKE  = "invokeDomain";

    /**
     * @param array $args
     * @return EitherFailureOrSuccess
     * @throws ExceptionErrorInvokeDomain
     */
    private function _invokeDomain (array $args) : EitherFailureOrSuccess {
        $handler = [$this, $this->HANDLER_METHOD_INVOKE];
        if ( is_callable($handler) ) {

            try {
                $reflection = new \ReflectionMethod($this,$this->HANDLER_METHOD_INVOKE);
            }catch (\Exception $e){
                throw new ExceptionErrorInvokeDomain($e->getMessage());
            }

            if ($reflection->isProtected()) {
                try {
                    return call_user_func_array( $handler , $args );
                } catch (\Exception $e){
                    return new \Ommua\FailureResponse([$e->getMessage()]);
                }
            }

            throw new ExceptionErrorInvokeDomain("The called method `{$this->HANDLER_METHOD_INVOKE}()` is required private.");
        }
        $className = get_class($this);
        throw  new ExceptionErrorInvokeDomain("Required implement: `private function {$this->HANDLER_METHOD_INVOKE}()` in your domain  -> {$className}");
    }
}
