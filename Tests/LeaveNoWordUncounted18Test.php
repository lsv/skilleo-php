<?php
/**
 * Created by PhpStorm.
 * User: lsv
 * Date: 9/8/14
 * Time: 3:21 AM
 */

class LeaveNoWordUncounted18Test extends PHPUnit_Framework_TestCase
{

    public function dataProvider()
    {
        return [
            ['Viva2!!!mus sus#cipit...tort55or eget fel)#=($=)is por_;:_ttitor volutpat.#$/(&#', '11'],
            ['Nulla por1ttitor acc#umsan tincidunt. Pelle,.,.-ntesque i in ipsum id orci a porta dapibus. Lore####m ipsum d56is lorem ut#(((/#libero malesuada feugia1t.!!!5', '25'],
            ['Praesent sapien.massa, convallis a pellentesque-nec, egestas non nisi.', '10'],
        ];
    }

    /**
     * @dataProvider dataProvider
     * @param string $input
     * @param string $expected
     */
    public function test_it($input, $expected)
    {
        $this->assertEquals($expected, LeaveNoWordUncounted18::test($input));
    }

}
 