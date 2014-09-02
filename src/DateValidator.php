<?php
class DateValidator
{

    const RETURN_FALSE = 'Invalid';
    const RETURN_TRUE = 'Valid';

    static public function test($input)
    {
        list($date1, $date2) = explode(' - ', $input);
        list($m1, $d1, $y1) = explode('/', $date1);
        list($m2, $d2, $y2) = explode('/', $date2);

        if (checkdate($m1, $d1, $y1) === false) {
            return self::RETURN_FALSE;
        }

        if (checkdate($m2, $d2, $y2) === false) {
            return self::RETURN_FALSE;
        }

        $date1 = date_create_from_format('m/d/Y', $date1);
        $date2 = date_create_from_format('m/d/Y', $date2);
        if ($date1->getTimestamp() > $date2->getTimestamp()) {
            return self::RETURN_FALSE;
        }

        return self::RETURN_TRUE;

    }

} 