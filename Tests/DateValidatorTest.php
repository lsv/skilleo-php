<?php
/**
 * Created by PhpStorm.
 * User: lsv
 * Date: 9/3/14
 * Time: 12:32 AM
 */

class DateValidatorTest extends PHPUnit_Framework_TestCase
{

    public function dataProvider()
    {
        return [
            ['date1_false', '12/34/2013 - 10/01/2014', DateValidator::RETURN_FALSE],
            ['date2_false', '12/23/2013 - 10/34/2014', DateValidator::RETURN_FALSE],
            ['date1_higher', '12/23/2013 - 10/10/2010', DateValidator::RETURN_FALSE],
            ['date_valid', '12/23/2013 - 10/01/2014', DateValidator::RETURN_TRUE],
            ['date_invalid', '11/22/2013 - 23/01/2015', DateValidator::RETURN_FALSE]
        ];
    }

    /**
     * @dataProvider dataProvider
     * @param string $name
     * @param string $input
     * @param string $expected
     */
    public function test_can_validate_date($name, $input, $expected)
    {
        $this->assertEquals($expected, DateValidator::test($input), $name);
    }

}
 