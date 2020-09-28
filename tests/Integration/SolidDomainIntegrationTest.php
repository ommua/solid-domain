<?php
use PHPUnit\Framework\TestCase;
use Ommua\Example\ConvertStringToInteger;

class SolidDomainIntegrationTest  extends TestCase
{
    public function testConvertStringToNumber(){
        $convertStringToInteger = new ConvertStringToInteger();
        $failOrSuccess = $convertStringToInteger(new \Ommua\Example\StringParameter("5"));
        $assertResult = $failOrSuccess->fold(function($error){
           return false;
        }, function ($success){
            return 5 === $success;
        });
        $this->assertTrue($assertResult);
    }

    public function testShouldResultFailureIfStringIsNotNumber(){
        $convertStringToInteger = new ConvertStringToInteger();
        $failOrSuccess = $convertStringToInteger(new \Ommua\Example\StringParameter("cinco"));
        $assertResult = $failOrSuccess->fold(function($error){
            $this->assertContains("Error cast string", $error[0]);
            return true;
        }, function ($success){
            return false;
        });
        $this->assertTrue($assertResult);
    }
}
