<?php

class RockPaperScissorTest extends \PHPUnit_Framework_TestCase
{

    public function dataProvider()
    {
        return array(
            array('John-R,Jane-E,Smith-B,Mike-D', 'No tournament'),
            array('Foo1-P,Foo2-S,Foo3-R,Foo4-P,Foo5-R', 'Foo5'),
            array('Bar1-P,Bar2-P,Bar3-R,Bar4-P,Bar5-F', 'Bar1'),
        );
    }

    /**
     * @dataProvider dataProvider
     * @param string $players
     * @param string $winner
     */
    public function testPlayers($players, $winner)
    {
        $players = explode(',', $players);
        $this->assertEquals($winner, RockPaperScissor::RpsTournament($players));
    }

}