<?php

class ThePairofCharacters
{

    /**
     * @param string $string
     * @return string
     */
    static public function pairOfCharacters($string)
    {
        $usedLetters = array();
        $letters = explode(' ', $string);
        foreach($letters as $l) {
            if (isset($usedLetters[$l])) {
                return $l;
            }
            $usedLetters[$l] = true;
        }

        return '';

    }

}