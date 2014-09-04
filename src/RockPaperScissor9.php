<?php
class RockPaperScissor9
{

    static private $moves = array(
        'R' => 'S',
        'P' => 'R',
        'S' => 'P'
    );

    static private function getWinner($match) {
        $keys = array_keys($match);

        $p1_name = $keys[0];
        $p1_val = $match[$keys[0]];
        $p1 = array($p1_name => $p1_val);

        if (count($keys) == 1) {
            return $p1;
        }

        $p2_name = $keys[1];
        $p2_val = $match[$keys[1]];
        $p2 = array($p2_name => $p2_val);

        if (self::$moves[$p1_val] == self::$moves[$p2_val]) {
            return $p1;
        } elseif (self::$moves[$p1_val] == $p2_val) {
            return $p1;
        } else {
            return $p2;
        }
    }

    static private function setMatches($matches) {
        $winnerofmatch = array();
        foreach($matches as $match) {
            $winner = self::getWinner($match);
            if (is_array($winner)) {
                $winnerofmatch = array_merge($winnerofmatch, $winner);
            }
        }
        return $winnerofmatch;
    }

    /**
     * @param array $playerstring
     * @return string
     */
    static public function RpsTournament(array $playerstring) {
        $players = array();
        foreach ($playerstring as $p) {
            list($player, $move) = explode("-", $p);
            if (array_key_exists($move, self::$moves)) {
                $players[$player] = $move;
            }
        }

        if (count($players) > 2) {
            while(count($players) > 1) {
                $players = self::setMatches(array_chunk($players, 2, true));
            }

            $key = array_keys($players);
            return $key[0];
        }

        return 'No tournament';
    }

}