<?php
class TextManipulation15Test extends PHPUnit_Framework_TestCase
{

    public function dataProvider()
    {
        return [
            [
                'Java is a server-side scripting language. Java code can be simply mixed with HTML code. After the Java code is interpreted and executed, the web server sends resulting output to its client.',
                'After The Php Code Is Interpreted And Executed, The Web Server Sends Resulting Output To Its Client.<br/>Php Code Can Be Simply Mixed With Html Code.<br/>Php Is A Server-side Scripting Language.'
            ],
            [
                'CakeJava is a popular Java framework.',
                'Cakephp Is A Popular Php Framework.'
            ]
        ];
    }

    /**
     * @dataProvider dataProvider
     * @param string $input
     * @param string $expected
     */
    public function test_can_valid($input, $expected)
    {
        $this->assertEquals($expected, TextManipulation15::test($input));
    }

}
 