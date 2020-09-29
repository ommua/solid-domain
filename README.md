# SolidDomain

A PHP library that wraps and handle the errors in one place following the SOLID principle

[![Total Downloads](https://poser.pugx.org/ommua/solid-domain/downloads)](https://packagist.org/packages/ommua/solid-domain)

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

##### Note: required implement "final protected function invokeDomain()" in your new Object Domain
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
     *  
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

$failureOrSuccess = $convertStringToInteger("five");
$result= $failureOrSuccess->fold(function($error){
   return $error;
}, function ($success){
    return $success;
});


// Print:  ["Error cast string five"]
echo $result;

```