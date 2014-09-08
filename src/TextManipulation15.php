<?php
/**
 * Created by PhpStorm.
 * User: lsv
 * Date: 9/4/14
 * Time: 1:35 PM
 */

class TextManipulation15
{

    static public function test($input)
    {
        $input = strtolower($input);
        $input = preg_split('/\s+/', $input);
        foreach($input as &$i) {
            $i = ucfirst($i);
        }
        $input = join(' ', $input);

        $input = str_replace('Java', 'Php', $input);
        $input = str_replace('java', 'php', $input);
        $input = str_replace('.', '<br/>', $input);

        $input = preg_split('/<br\/>/', $input, PREG_SPLIT_DELIM_CAPTURE|PREG_SPLIT_OFFSET_CAPTURE);
        $input = array_reverse(array_filter(array_map('trim', $input)));
        $input = join('.<br/>', $input) . '.';
        return $input;
    }

} 