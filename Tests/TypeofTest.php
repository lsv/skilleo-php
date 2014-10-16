<?php

class TypeofTest extends PHPUnit_Framework_TestCase
{

    public function arrayProvider()
    {
        return [
            ['[bread,apples,pears]', 'Found 1 arrays, 0 strings, 0 integer numbers and 0 floating-point numbers.'],
            ['[bread,apples,[pears]]', 'Found 1 arrays, 0 strings, 0 integer numbers and 0 floating-point numbers.'],
            ['[array,[of,array]]', 'Found 1 arrays, 0 strings, 0 integer numbers and 0 floating-point numbers.'],
            ['[]', 'Found 0 arrays, 1 strings, 0 integer numbers and 0 floating-point numbers.']
        ];
    }

    public function integerProvider()
    {
        return [
            ['This is my sentence n. 5', 'Found 0 arrays, 5 strings, 1 integer numbers and 0 floating-point numbers.'],
            ['+5 -4.2', 'Found 0 arrays, 0 strings, 1 integer numbers and 1 floating-point numbers.'],
            ['Hello. I am 14.', 'Found 0 arrays, 3 strings, 1 integer numbers and 0 floating-point numbers.']
        ];
    }

    public function floatingProvider()
    {
        return [
            ['1.2.3', 'Found 0 arrays, 1 strings, 0 integer numbers and 0 floating-point numbers.'],
            ['1.2 word/)/=)?(/(UIJBHVGYUHNJ', 'Found 0 arrays, 1 strings, 0 integer numbers and 1 floating-point numbers.'],
            ['.2 Hi', 'Found 0 arrays, 2 strings, 0 integer numbers and 0 floating-point numbers.'],
            ['1.2 Hi', 'Found 0 arrays, 1 strings, 0 integer numbers and 1 floating-point numbers.']
        ];
    }

    public function dataProvider()
    {
        return [
            ['', 'Found 0 arrays, 0 strings, 0 integer numbers and 0 floating-point numbers.'],
            ['I\'ve bought 5 [bread,apples,pears].', 'Found 1 arrays, 2 strings, 1 integer numbers and 0 floating-point numbers.'],
            ['If pi is 3.14059 I\'m unpi.', 'Found 0 arrays, 5 strings, 0 integer numbers and 1 floating-point numbers.']
        ];
    }

    /**
     * @dataProvider integerProvider
     * @param $input
     * @param $expected
     */
    public function test_can_get_integers($input, $expected)
    {
        $this->assertEquals($expected, Typeof::test($input));
    }

    /**
     * @dataProvider arrayProvider
     *
     * @param string $input
     * @param string $expected
     */
    public function test_can_get_arrays($input, $expected)
    {
        $this->assertEquals($expected, Typeof::test($input));
    }

    /**
     * @dataProvider floatingProvider
     *
     * @param $input
     * @param $expected
     */
    public function test_can_get_floating($input, $expected)
    {
        $this->assertEquals($expected, Typeof::test($input));
    }

    /**
     * @dataProvider dataProvider
     *
     * @param string $input
     * @param string $expected
     */
    public function test_can_get_typeof($input, $expected)
    {
        $this->assertEquals($expected, Typeof::test($input));
    }

}
 