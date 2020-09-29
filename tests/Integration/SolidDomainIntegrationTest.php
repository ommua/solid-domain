<?php
use PHPUnit\Framework\TestCase;
use Ommua\Example\ConvertStringToInteger;

class SolidDomainIntegrationTest  extends TestCase
{
    public function testConvertStringToNumber(){
        $convertStringToInteger = new ConvertStringToInteger();
        $failOrSuccess = $convertStringToInteger(new \Ommua\Example\StringParameter("5"));
        $assertResult = $failOrSuccess->fold(function($error){
           return $error;
        }, function ($success){
            return $success;
        });
        $this->assertEquals(5, $assertResult);
    }


    public function testShouldResultFailureIfStringIsNotNumber(){
        $convertStringToInteger = new ConvertStringToInteger();
        $failOrSuccess = $convertStringToInteger(new \Ommua\Example\StringParameter("cinco"));
        $assertResult = $failOrSuccess->fold(function($error){
            return $error;
        }, function ($success){
            return $success;
        });
        $this->assertContains("Error cast string",$assertResult[0]);
    }

    public function testShouldResultErorrParams(){
        $convertStringToInteger = new ConvertStringToInteger();
        $failOrSuccess = $convertStringToInteger("cinco");
        $assertResult = $failOrSuccess->fold( static function($error){
            return $error;
        }, static function ($success){
            return $success;
        });
        $this->assertContains("Argument 1 passed to Ommua\Example\ConvertStringToInteger::invokeDomain() must be an instance of Ommua\Example\StringParameter, string given",$assertResult[0]);
    }
}
