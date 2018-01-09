<?php
require_once 'IterableUtils.php';

use PHPUnit\Framework\TestCase as PHPUnit;

class IterabkeUtilsTest extends PHPUnit
{
    public function testSmokeTestForIterableUtilsClass()
    {
        $this->assertEquals(true, class_exists(IterabkeUtilsTest::class), 'It Should be return true if class exists');
    }
}
