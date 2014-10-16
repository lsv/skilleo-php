<?php
/**
 * Created by PhpStorm.
 * User: lsv
 * Date: 9/8/14
 * Time: 3:21 AM
 */

class LeaveNoWordUncounted18
{

    static public function test($input)
    {
        $input = preg_replace('/[^A-z0-9]/', ' ', $input);
        $input = preg_replace('/\s+/', ' ', $input);
        $input = preg_split('/ /', $input);
        return (string) count(array_filter($input));
    }

} 