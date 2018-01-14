<?php
require_once 'IterableUtils.php';

use PHPUnit\Framework\TestCase as PHPUnit;

class IterabkeUtilsTest extends PHPUnit
{

    protected $arrayNumbersMock = [];
    protected $arrayWordsMock = [];
    protected $arrayLettersMock = [];

    public function setUp()
    {
        $this->arrayNumbersMock = [1, 2, 3, 4, 5];
        $this->arrayWordsMock = ['lorem', 'ipsum', 'dolor', 'sit', 'amet'];
        $this->arrayLettersMock = ['a', 'b', 'c', 'd', 'e'];
    }

    public function testSmokeTestForIterableUtilsClass()
    {
        $this->assertEquals(true, class_exists(\App\Utils\IterableUtils::class), 'It Should be return true if class exists');
    }

    public function testSmokeTestForMapMethod()
    {
        $this->assertEquals(true, method_exists(\App\Utils\IterableUtils::class, 'map'), 'It should be return true if method exists');
    }

    public function testReturnDoubleOfNumbersAccordingCallback()
    {
        $arrExepected = [2, 4, 6, 8, 10];
        $arrResult = \App\Utils\IterableUtils::map($this->arrayNumbersMock, function($value) {
                return $value * 2;
            });

        $this->assertEquals($arrExepected, $arrResult, 'It should be return an array with double values of numbers');
    }

    public function testReturnUppercaseLettersAccordingCallback()
    {
        $arrExepected = ['A', 'B', 'C', 'D', 'E'];
        $arrResult = \App\Utils\IterableUtils::map($this->arrayLettersMock, function($value) {
                return strtoupper($value);
            });

        $this->assertEquals($arrExepected, $arrResult, 'It should be return an array with the letters in uppercase');
    }

    public function testReturnUppercaseLettersConcatenatedWithIndexAccordingCallback()
    {
        $arrExepected = ['0A', '1B', '2C', '3D', '4E'];
        $arrResult = \App\Utils\IterableUtils::map($this->arrayLettersMock, function($value, $index) {
                return $index . strtoupper($value);
            });

        $this->assertEquals($arrExepected, $arrResult, 'It should be return an array with the letters in uppercase concatenated with index');
    }

    public function testReturnArrayWithNullInContentsWhenNoHaveReturnOnCallback()
    {
        $arrExepected = [null, null, null, null, null];
        $arrResult = \App\Utils\IterableUtils::map($this->arrayNumbersMock, function($value) {
                // empty
            });

        $this->assertEquals($arrExepected, $arrResult, 'It should be return an array with null values when no have return on callback');
    }

    public function testReturnAnEmptyArrayWhenAnEmptyArrayIsPassed()
    {
        $arrExepected = [];
        $arrResult = \App\Utils\IterableUtils::map([], function($value) {
                return $value;
            });

        $this->assertEquals($arrExepected, $arrResult, 'It should be return an empty array');
    }

    public function testSmokeTestForFindMethod()
    {
        $this->assertEquals(true, method_exists(\App\Utils\IterableUtils::class, 'find'), 'It should be return true if the find method exists');
    }

    public function testReturnAnResultIfTheConditionOfCallbackIsTruly()
    {
        $exepected = 'dolor';
        $result = \App\Utils\IterableUtils::find($this->arrayWordsMock, function($value) {
                return $value === 'dolor';
            });

        $this->assertEquals($exepected, $result, 'It should be return "dolor"');
    }

    public function testReturnNullWhenTheConditionIsNotSatisfactory()
    {
        $exepected = null;
        $result = \App\Utils\IterableUtils::find($this->arrayWordsMock, function($value) {
                return $value === 'XXX';
            });

        $this->assertEquals($exepected, $result, 'It should be return null when the condition is not satisfactory');
    }

    public function testReturnNullWhenAnEmptyArrayIsPassed()
    {
        $exepected = null;
        $result = \App\Utils\IterableUtils::find([], function($value) {
                return $value === 'XXX';
            });

        $this->assertEquals($exepected, $result, 'It should be return null when an empty array is passed');
    }
}
