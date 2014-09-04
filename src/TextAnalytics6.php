<?php

class TextAnalytics6
{
    /**
     * @param array $data
     * @param int $times
     * @return array [0]=array: Array of used, [1]=integer: Number of used above $times
     */
    static private function analyzeArray(array $data, $times = 2)
    {
        $used = array();
        foreach($data as $w) {
            if (isset($used[$w])) {
                $used[$w]++;
            } else {
                $used[$w] = 1;
            }
        }

        $i = 0;
        foreach($used as $num) {
            if ($num >= $times) {
                $i++;
            }
        }

        return [$used, $i];
    }

    static public function analyze($input)
    {
        $input = strtolower($input);
        preg_match_all('/[a-zA-Z]/', $input, $letterMatch);
        preg_match_all('/[^ a-zA-Z]/', $input, $symbolMatch);

        list($wordCount, $words_used_twice) = self::analyzeArray(str_word_count($input, 1));

        $words_used_once = 0;
        foreach($wordCount as $n) {
            if ($n == 1) {
                $words_used_once++;
            }
        }

        return sprintf(
            '%d, %d, %d, %d, %d, %d',
            str_word_count($input),
            count($letterMatch[0]),
            count($symbolMatch[0]),
            $words_used_twice,
            self::analyzeArray($letterMatch[0], 3)[1],
            $words_used_once
        );
    }

}