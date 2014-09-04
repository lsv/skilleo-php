<?php

class TextAnalyticsTest extends \PHPUnit_Framework_TestCase
{

    public function dataProvider()
    {
        return array(
            array('Pellentesque in ipsum id orci porta dapibus. Vivamus, magna justo, lacinia eget consectetur sed, convallis at tellus.', '17, 96, 5, 0, 15, 17'),
            array('Some small sample text!', '4, 19, 1, 0, 4, 4'),
            array('Skilleo is cool', '3, 13, 0, 0, 2, 3'),
            array('Donec sollicitudin molestie malesuada. Donec rutrum congue leo eget malesuada.', '10, 67, 2, 2, 12, 6'),
            array('Cras ultricies ligula! Sed magna, dictum porta.', '7, 38, 3, 0, 8, 7'),
        );
    }

    /**
     * @dataProvider dataProvider
     * @param string $input
     * @param string $expected
     */
    public function test_can_analyze($input, $expected)
    {
        $this->assertEquals($expected, TextAnalytics6::analyze($input));
    }

}