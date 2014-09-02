<?php
class PasswordStrengthTest extends PHPUnit_Framework_TestCase
{

    public function dataProvider()
    {
        return array(
            array('no-symbol', 'abc0eF', PasswordStrength::RETURN_FALSE),
            array('strlen', '12345', PasswordStrength::RETURN_FALSE),
            array('whitespace', 'Hello World', PasswordStrength::RETURN_FALSE),
            array('no-capital', 'abcdef', PasswordStrength::RETURN_FALSE),
            array('no-number', 'abcdeF', PasswordStrength::RETURN_FALSE),
            array('valid', '#Some_Pass1#', PasswordStrength::RETURN_TRUE),
        );
    }

    /**
     * @dataProvider dataProvider
     * @param string $input
     * @param string $expect
     */
    public function test_can_test_passwordstrength($name, $input, $expect)
    {
        $this->assertEquals($expect, PasswordStrength::test($input), $name . ' failed');
    }

}
 