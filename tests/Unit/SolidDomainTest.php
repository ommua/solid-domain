<?php


use Ommua\Exceptions\ExceptionErrorInvokeDomain;
use Ommua\SolidDomain;
use PHPUnit\Framework\TestCase;

class  TestDomain extends SolidDomain{}

class SolidDomainTest extends TestCase
{

    public function test__checkIntance (){
        $this->assertInstanceOf(\Ommua\Interfaces\SolidDomainInterface::class, new TestDomain());
    }

    public function test_generate_exception_when_invoke()
    {
        $this->expectException(ExceptionErrorInvokeDomain::class);
        $domain = new TestDomain();
        $domain();
        self::assertTrue(true);
    }


}
