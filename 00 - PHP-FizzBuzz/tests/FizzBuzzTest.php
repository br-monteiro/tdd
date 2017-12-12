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
        $this->assertEquals(false, $this->fizzBuzz->isFizz(2), "Should be returned false");
    }

    public function testResultIsBuzz()
    {
        $this->assertEquals('Buzz', $this->fizzBuzz->isBuzz(5), "Should be returned 'Buzz'");
    }

    public function testResultOfBuzzIsFalse()
    {
        $this->assertEquals(false, $this->fizzBuzz->isBuzz(4), "Should be returned false");
    }

    /**
     * @expectedException \Exception
     */
    public function testThrowExceptionIfNumberIsLessOrEqualOne()
    {
        $this->fizzBuzz->setQuantity(1);
    }
}
