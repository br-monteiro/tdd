<?php
require_once 'IterableUtils.php';

use PHPUnit\Framework\TestCase as PHPUnit;
use App\Utils\IterableUtils;

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
        $this->assertEquals(true, class_exists(IterableUtils::class), 'It Should be return true if class exists');
    }

    public function testSmokeTestForMapMethod()
    {
        $this->assertEquals(true, method_exists(IterableUtils::class, 'map'), 'It should be return true if method exists');
    }

    public function testReturnDoubleOfNumbersAccordingCallback()
    {
        $arrExepected = [2, 4, 6, 8, 10];
        $callback = function($value) {
            return $value * 2;
        };

        $arrResult = IterableUtils::map($this->arrayNumbersMock, $callback);

        $this->assertEquals($arrExepected, $arrResult, 'It should be return an array with double values of numbers');
    }

    public function testReturnUppercaseLettersAccordingCallback()
    {
        $arrExepected = ['A', 'B', 'C', 'D', 'E'];
        $callback = function($value) {
            return strtoupper($value);
        };

        $arrResult = IterableUtils::map($this->arrayLettersMock, $callback);

        $this->assertEquals($arrExepected, $arrResult, 'It should be return an array with the letters in uppercase');
    }

    public function testReturnUppercaseLettersConcatenatedWithIndexAccordingCallback()
    {
        $arrExepected = ['0A', '1B', '2C', '3D', '4E'];
        $callback = function($value, $index) {
            return $index . strtoupper($value);
        };

        $arrResult = IterableUtils::map($this->arrayLettersMock, $callback);

        $this->assertEquals($arrExepected, $arrResult, 'It should be return an array with the letters in uppercase concatenated with index');
    }

    public function testReturnArrayWithNullInContentsWhenNoHaveReturnOnCallback()
    {
        $arrExepected = [null, null, null, null, null];
        $callback = function($value) {
            // no have return
        };

        $arrResult = IterableUtils::map($this->arrayNumbersMock, $callback);

        $this->assertEquals($arrExepected, $arrResult, 'It should be return an array with null values when no have return on callback');
    }

    public function testReturnAnEmptyArrayWhenAnEmptyArrayIsPassed()
    {
        $arrExepected = [];
        $callback = function($value) {
            return $value;
        };

        $arrResult = IterableUtils::map([], $callback);

        $this->assertEquals($arrExepected, $arrResult, 'It should be return an empty array');
    }

    public function testSmokeTestForFindMethod()
    {
        $this->assertEquals(true, method_exists(IterableUtils::class, 'find'), 'It should be return true if the find method exists');
    }

    public function testReturnAnResultIfTheConditionOfCallbackIsTruly()
    {
        $exepected = 'dolor';
        $callback = function($value) {
            return $value === 'dolor';
        };

        $result = IterableUtils::find($this->arrayWordsMock, $callback);

        $this->assertEquals($exepected, $result, 'It should be return "dolor"');
    }

    public function testReturnNullWhenTheConditionIsNotSatisfactory()
    {
        $exepected = null;
        $callback = function($value) {
            return $value === 'XXX';
        };

        $result = IterableUtils::find($this->arrayWordsMock, $callback);

        $this->assertEquals($exepected, $result, 'It should be return null when the condition is not satisfactory');
    }

    public function testReturnNullWhenAnEmptyArrayIsPassed()
    {
        $exepected = null;
        $callback = function($value) {
            return $value === 'XXX';
        };

        $result = IterableUtils::find([], $callback);

        $this->assertEquals($exepected, $result, 'It should be return null when an empty array is passed');
    }

    public function testSmokeTestForFilterMethod()
    {
        $this->assertEquals(true, method_exists(IterableUtils::class, 'filter'), 'It should be return true if the filter method exists');
    }

    public function testReturnFilteredArrayAccordingCallback()
    {
        $exepected = [1, 3, 5];
        $callback = function($value) {
            return $value % 2 != 0;
        };

        $result = IterableUtils::filter($this->arrayNumbersMock, $callback);

        $this->assertEquals($exepected, $result, 'It should be return an array with odd numbers');
        ////
        $exepected = ['lorem', 'ipsum'];
        $callback = function($value) {
            return (bool) preg_match('/.*m$/', $value);
        };

        $result = IterableUtils::filter($this->arrayWordsMock, $callback);

        $this->assertEquals($exepected, $result, 'It should be return an array with lorem, ipsum values');
    }

    public function testReturnAnEmptyArrayWhenTheCallbackNoHaveReturn()
    {
        $exepected = [];
        $callback = function($value) {
            // no have return
        };

        $result = IterableUtils::filter($this->arrayNumbersMock, $callback);

        $this->assertEquals($exepected, $result, 'It should be return an array with odd numbers');
    }
}
