<?php
class ThePairofCharactersTest extends \PHPUnit_Framework_TestCase
{

    public function dataProvider()
    {
        return array(
            array('a b c d d e f', 'd'),
            array('b b', 'b'),
            array('a j h d f s e r s', 's'),
            array('a b c', '')
        );
    }

    /**
     * @dataProvider dataProvider
     * @param string $input
     * @param string $expected
     */
    public function test_can_get_pairs($input, $expected)
    {
        $this->assertEquals($expected, ThePairofCharacters::pairOfCharacters($input));
    }

} 