<?php

class TextAnalytics
{
    /**
     * @param array $data
     * @param int $times
     * @return array
     */
    static private function analyzeArray(array $data, $times = 2)
    {
        $i = 0;
        $used = array();
        foreach($data as $w) {
            if (isset($used[$w])) {
                if ($used[$w] >= ($times - 1)) {
                    $i++;
                }
                $used[$w]++;
            } else {
                $used[$w] = 1;
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