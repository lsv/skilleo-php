<?php

class TheOverlappingSquaresTest extends \PHPUnit_Framework_TestCase
{

    public function dataProvider()
    {
        return array(
            array('(0,-2) (2,-2) (2,-4) (0,-4) (1,-3) (3,-3) (3,-5) (1,-5)', 1)
        );
    }

    /**
     * @dataProvider dataProvider
     * @param string $input
     * @param int $expected
     */
    public function test_can_test_overlapping_square($input, $expected)
    {
        $this->assertEquals($expected, TheOverlappingSquares::setSquares($input));
    }

}