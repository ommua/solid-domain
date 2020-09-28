# SolidDomain

A PHP library that wraps and handle the errors in one place following the SOLID principle

[![Build Status](https://travis-ci.org/00F100/array_dot.svg?branch=master)](https://travis-ci.org/00F100/array_dot) [![codecov](https://codecov.io/gh/00F100/array_dot/branch/master/graph/badge.svg)](https://codecov.io/gh/00F100/array_dot) [![Total Downloads](https://poser.pugx.org/00F100/array_dot/downloads)](https://packagist.org/packages/00F100/array_dot)

## How to install

Composer:

```sh
$ composer require ommua/solid-domain
```

or add in composer.json

```json
{
    "require": {
        "ommua/solid-domain": "*"
    }
}
```

## How to use

```php
EXAMPLE: 
<?php
use Ommua\FailureResponse;
use Ommua\SuccessResponse;
use Ommua\SolidDomain;
use Ommua\Interfaces\EitherFailureOrSuccess;

class ConvertStringToInteger extends SolidDomain
{
    /**
     * @param String $stringNumber
     * @return EitherFailureOrSuccess
     */
    final protected function invokeDomain(String $stringNumber)
    {
        if (is_numeric($stringNumber))
            return new SuccessResponse(intval($stringNumber));
        else
            return new FailureResponse(["Error cast string {$stringNumber}"]);
    }
}

$convertStringToInteger = new ConvertStringToInteger();
$failureOrSuccess = $convertStringToInteger("5");

$result= $failureOrSuccess->fold(function($error){
   return $error;
}, function ($success){
    return $success;
});

// Print: 5
echo $result;

// Print: Error cast string five

```