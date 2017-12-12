<?php
require_once 'FizzBuzz.php';

use PHPUnit\Framework\TestCase as PHPUnit;

class FizzBuzzTest extends PHPUnit
{

    protected $fizzBuzz;

    public function setUp()
    {
        $this->fizzBuzz = new FizzBuzz(15);
    }

    public function testQuantityResultReturns()
    {
        $this->assertEquals(15, count($this->fizzBuzz->getResults()));
    }

    public function testReturnsArrayFromResults()
    {
        $this->assertEquals('array', gettype($this->fizzBuzz->getResults()), "Should be returned a array type");
    }

    public function testResultIsFizz()
    {
        $this->assertEquals('Fizz', $this->fizzBuzz->isFizz(3), "Should be returned 'Fizz'");
    }

    public function testResultOfFizzIsFalse()
    {
        $this->assertEquals(null, $this->fizzBuzz->isFizz(2), "Should be returned null");
    }

    public function testResultIsBuzz()
    {
        $this->assertEquals('Buzz', $this->fizzBuzz->isBuzz(5), "Should be returned 'Buzz'");
    }

    public function testResultOfBuzzIsFalse()
    {
        $this->assertEquals(null, $this->fizzBuzz->isBuzz(4), "Should be returned null");
    }

    /**
     * @expectedException \Exception
     */
    public function testThrowExceptionIfNumberIsLessOrEqualOne()
    {
        $this->fizzBuzz->setQuantity(1);
    }

    public function testResultAsObject()
    {
        $expectedObject = new \stdClass();
        $expectedObject->r1 = 1;
        $expectedObject->r2 = 2;
        $expectedObject->r3 = 'Fizz';
        $expectedObject->r4 = 4;
        $expectedObject->r5 = 'Buzz';
        $expectedObject->r6 = 'Fizz';
        $expectedObject->r7 = 7;
        $expectedObject->r8 = 8;
        $expectedObject->r9 = 'Fizz';
        $expectedObject->r10 = 'Buzz';
        $expectedObject->r11 = 11;
        $expectedObject->r12 = 'Fizz';
        $expectedObject->r13 = 13;
        $expectedObject->r14 = 14;
        $expectedObject->r15 = 'FizzBuzz';

        $this->assertEquals('object', gettype($this->fizzBuzz->getResultsAsObject()), "Should be returned stdClass Object");
        $this->assertEquals($expectedObject, $this->fizzBuzz->getResultsAsObject(), "Should be returned an equal Object");
    }

    public function testResultAsJson()
    {
        $expectedJson = '{"r1":1,"r2":2,"r3":"Fizz","r4":4,"r5":"Buzz","r6":"Fizz","r7":7,"r8":8,"r9":"Fizz","r10":"Buzz","r11":11,"r12":"Fizz","r13":13,"r14":14,"r15":"FizzBuzz"}';

        $this->assertEquals('string', gettype($this->fizzBuzz->getResultsAsJson()), "Should be returned JSON string");
        $this->assertEquals($expectedJson, $this->fizzBuzz->getResultsAsJson(), "Should be returned JSON string");
    }
}
