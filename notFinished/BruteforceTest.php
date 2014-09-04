<?php
/**
 * Created by PhpStorm.
 * User: lsv
 * Date: 9/3/14
 * Time: 12:42 AM
 */

class BruteforceTest extends PHPUnit_Framework_TestCase
{

    public function dataProvider()
    {
        return [
            ['81b5dd04bf5cbc172eeb34bb8062fde1', 'a23c']
        ];
    }

    /**
     * @dataProvider dataProvider
     * @param string $input
     * @param string $expected
     */
    public function test_can_bruteforce($input, $expected)
    {
        $this->assertEquals($expected, Bruteforce::brute($input));
    }

}
 