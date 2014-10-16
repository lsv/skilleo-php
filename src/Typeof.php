<?php

class Typeof
{

    static public function test($input)
    {
        $numArrays = 0;
        $numStrings = 0;
        $numIntegers = 0;
        $numFloating = 0;

        $input = (substr($input, -1) == '.' ? substr($input, 0, -1) : $input);
        if (strlen($input) > 0) {
            $strings = explode(' ', $input);
            foreach ($strings as $string) {

                if (substr($input, 0, 1) != '.') {
                    if (is_numeric($string)) {
                        $value = $string + 0;
                        if (is_int($value)) {
                            $numIntegers += 1;
                            continue;
                        }

                        if (is_float($value)) {
                            $numFloating += 1;
                            continue;
                        }

                    }
                }

                if (self::isArray($string)) {
                    $numArrays += 1;
                    continue;
                }

                $numStrings += 1;
            }
        }

        return sprintf(
            'Found %d arrays, %d strings, %d integer numbers and %d floating-point numbers.',
            $numArrays,
            $numStrings,
            $numIntegers,
            $numFloating
        );
    }

    static private function isArray($input)
    {
        if ($input == '[]') {
            return false;
        }
        return preg_match('/\[(.*?)\]/si', $input);
    }

}
 