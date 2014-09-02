<?php

class TheOverlappingSquares
{

    static private $squares = array();

    /**
     * @param array $coordinates
     */
    static private function addSquare($coordinates)
    {
        self::$squares[] = array(
            'top-left' => $coordinates[0],
            'top-right' => $coordinates[1],
            'bottom-right' => $coordinates[2],
            'bottom-left' => $coordinates[3],
        );
    }

    static private function hasOverlap()
    {

    }

    /**
     * @param string $input
     */
    static public function setSquares($input)
    {
        $squares = array_chunk(explode(' ', $input), 4);
        foreach($squares as $square) {
            self::addSquare($square);
        }
        var_dump(self::$squares);
        exit;
        return self::hasOverlap();
    }

}