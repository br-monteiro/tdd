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
}
