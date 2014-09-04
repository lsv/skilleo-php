<?php
class PasswordStrengthTest extends PHPUnit_Framework_TestCase
{

    public function dataProvider()
    {
        return array(
            array('no-symbol', 'abc0eF', PasswordStrength7::RETURN_FALSE),
            array('strlen', '12345', PasswordStrength7::RETURN_FALSE),
            array('whitespace', 'Hello World', PasswordStrength7::RETURN_FALSE),
            array('no-capital', 'abcdef', PasswordStrength7::RETURN_FALSE),
            array('no-number', 'abcdeF', PasswordStrength7::RETURN_FALSE),
            array('valid', '#Some_Pass1#', PasswordStrength7::RETURN_TRUE),
        );
    }

    /**
     * @dataProvider dataProvider
     * @param string $input
     * @param string $expect
     */
    public function test_can_test_passwordstrength($name, $input, $expect)
    {
        $this->assertEquals($expect, PasswordStrength7::test($input), $name . ' failed');
    }

}
 