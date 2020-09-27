<?php

namespace Ommua\Example;

use Ommua\FailureResponse;
use Ommua\SuccessResponse;

class ConvertStringToInteger extends \Ommua\SolidDomain
{
    /**
     * @param StringParameter $data
     * @return string
     */
    final protected function invokeDomain(StringParameter $data)
    {
        if (is_numeric($data->stringNumber))
            return new SuccessResponse(intval($data->stringNumber));
        else
            return new FailureResponse(["Error cast string {$data->stringNumber}"]);
    }
}
