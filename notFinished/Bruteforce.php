<?php
/**
 * Created by PhpStorm.
 * User: lsv
 * Date: 9/3/14
 * Time: 12:42 AM
 */

class Bruteforce
{

    const MAX_LENGTH = 4;
    const CHARS = 'abc0123';

    static public function brute($input)
    {
        for($s = 0; $s < count_chars(self::CHARS); $s++) {
            for($i = 0; $i < self::MAX_LENGTH; $i++) {
            }
        }
    }

} 