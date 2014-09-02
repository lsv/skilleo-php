<?php

class TextAnalyticsTest extends \PHPUnit_Framework_TestCase
{

    public function dataProvider()
    {
        return array(
            array('Some small sample text!', '4, 19, 1, 0, 4, 4'),
            array('Skilleo is cool', '3, 13, 0, 0, 2, 3'),
        );
    }

    /**
     * @dataProvider dataProvider
     * @param string $input
     * @param string $expected
     */
    public function test_can_analyze($input, $expected)
    {
        $this->assertEquals($expected, TextAnalytics::analyze($input));
    }

}