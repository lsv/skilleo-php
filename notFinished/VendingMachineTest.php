<?php
/**
 * Created by PhpStorm.
 * User: lsv
 * Date: 9/3/14
 * Time: 12:49 AM
 */

class VendingMachineTest extends PHPUnit_Framework_TestCase
{

    public function dataProvider()
    {
        return [
            ['"product_code":"A01","inserted_money":[0,0,0,0,0,0,1,0,0],"existing_money":[5,10,2,12,2,2,1,3,0]}', VendingMachine::ERROR_NOT_VALID_JSON],
            ['{"product_code":"B01","inserted_money":[0,0,0,0,0,0,1,0,0],"existing_money":[5,10,2,12,2,2,1,3,0]}', VendingMachine::ERROR_PRODUCT_CODE],
            ['{"product_code":"A01","inserted_money":[0,0,0,0,0,0,1,0,0],"existing_money":[5,10,2,12,2,2,1,3,0]}', '0 1 5 5']
        ];
    }

    /**
     * @dataProvider dataProvider
     * @param string $input
     * @param string $expected
     */
    public function test_can_calc_vending($input, $expected)
    {
        $this->assertEquals($expected, VendingMachine::buy($input));
    }

}
 