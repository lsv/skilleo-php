<?php
class MusicEventManager13
{

    const ERROR_INVALID_JSON = 'invalid json';
    const ERROR_BANDS_NOTEXISTS = 'Bands does not exists in json';
    const ERROR_SHOWS_NOTEXISTS = 'Shows does not exists in json';
    const ERROR_BANDS_INVALID = 'Bands have invalid data';
    const ERROR_SHOWS_INVALID = 'Shows have invalid data';

    static private $bands = array();
    static private $shows = array();

    /**
     * @param $input
     * @return string
     *
     * @throws \InvalidArgumentException Invalid json
     * @throws \InvalidArgumentException Invalid bands
     * @throws \InvalidArgumentException Invalid shows
     */
    static public function getEvents($input)
    {
        self::$bands = array();
        self::$shows = array();

        $json = json_decode($input, true);
        if ($json === null || $json === false) {
            throw new \InvalidArgumentException(self::ERROR_INVALID_JSON);
        }

        if (isset($json['bands']) && is_array($json['bands'])) {
            self::setBands($json['bands']);
        } else {
            throw new \InvalidArgumentException(self::ERROR_BANDS_NOTEXISTS);
        }

        if (isset($json['shows']) && is_array($json['shows'])) {
            self::setShows($json['shows']);
        } else {
            throw new \InvalidArgumentException(self::ERROR_SHOWS_NOTEXISTS);
        }

        $output = array();
        foreach(self::$shows as $show) {
            $output[] = sprintf('%d-%d', $show['id'], self::getBandsAvailable($show));
        }

        return join(',', $output);

    }

    static private function getBandsAvailable($show)
    {
        $counter = 0;
        foreach(self::$bands as $band) {
            if ($show['style'] == $band['style'] && self::dateIsBetween($band['from'], $band['to'], $show['date'])) {
                $counter++;
            }
        }
        return $counter;
    }

    /**
     * @param array $bands
     * @throws \InvalidArgumentException Invalid band data
     */
    static private function setBands(array $bands)
    {
        foreach($bands as $band) {
            if (isset($band['id'], $band['style'], $band['date_range'])) {
                list($from, $to) = explode('/', $band['date_range']);
                $band['from'] = self::setDate($from, false);
                $band['to'] = self::setDate($to, true);
                self::$bands[] = $band;
            } else {
                throw new \InvalidArgumentException(self::ERROR_BANDS_INVALID);
            }
        }
    }

    /**
     * @param array $shows
     * @throws \InvalidArgumentException Invalid show data
     */
    static private function setShows(array $shows)
    {
        foreach($shows as $show) {
            if (isset($show['id'], $show['style'], $show['date'])) {
                $show['date'] = self::setDate($show['date'], false, true);
                self::$shows[] = $show;
            } else {
                throw new \InvalidArgumentException(self::ERROR_SHOWS_INVALID);
            }
        }
    }

    static private function setDate($date, $to = true, $isShow = false)
    {
        list($d, $m) = explode('-', $date);
        if (! checkdate($m, $d, date('Y'))) {
            throw new \InvalidArgumentException('Date is not correct "' . $date . '"');
        }

        $clock = '00:00:00';
        if ($isShow) {
            $clock = '16:00:00';
        } elseif($to) {
            $clock = '23:59:59';
        }

        $datetime = date_create_from_format('m-d-Y H:i:s',
            sprintf(
                '%d-%d-%d %s',
                $m,
                $d,
                date('Y'),
                $clock
            )
        );

        return $datetime;
    }

    static private function dateIsBetween(\DateTime $between_from, \DateTime $between_to, \DateTime $between) {
        return
            ($between->getTimestamp() >= $between_from->getTimestamp())
            &&
            ($between->getTimestamp() <= $between_to->getTimestamp())
        ;
    }
}
