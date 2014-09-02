<?php
class MultiOperationCalculator
{

    /**
     * @param string $math
     * @return float
     */
    static public function math($math)
    {
        $equation = preg_replace('/\s+/', '', $math);
        $result = '';
        eval('$result = '.$equation.';');
        return $result;
    }

}