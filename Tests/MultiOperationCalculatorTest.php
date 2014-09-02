<?php

class MultiOperationCalculatorTest extends \PHPUnit_Framework_TestCase
{

    public function dataProvider()
    {
        return array(
            array('15 + 2 - 4 + 2', 15),
            array('-4 / 2 + 2', 0),
            array('-4', -4)
        );
    }

    /**
     * @dataProvider dataProvider
     * @param string $math
     * @param int $result
     */
    public function test_can_do_math($math, $result)
    {
        $this->assertEquals($result, \MultiOperationCalculator::math($math));
    }

    public function test_can_add()
    {
        $this->assertEquals(10, \MultiOperationCalculator::math('5 + 5'));
    }

    public function test_can_divide()
    {
        $this->assertEquals(5, \MultiOperationCalculator::math('10 / 2'));
    }

    public function test_can_substract()
    {
        $this->assertEquals(0, \MultiOperationCalculator::math('5 - 5'));
    }

    public function test_can_multiply()
    {
        $this->assertEquals(10, \MultiOperationCalculator::math('2 * 5'));
    }

}