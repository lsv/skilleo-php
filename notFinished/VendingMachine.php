<?php
/**
 * Created by PhpStorm.
 * User: lsv
 * Date: 9/3/14
 * Time: 12:49 AM
 */

class VendingMachine
{

    const ERROR_NOT_VALID_JSON = 'Not valid json';
    const ERROR_PRODUCT_CODE = 'Wrong code';
    const ERROR_NOT_ENOUGH_MONEY = 'Not enough money';

    static private $products = [
        'A01' => 0.85,
        'A02' => 0.35,
        'A03' => 0.55,
        'A04' => 2.50,
        'A05' => 6.85
    ];

    static private $coins = [
        0 => 0.05,
        1 => 0.10,
        2 => 0.20,
        3 => 0.50,
        4 => 1,
        5 => 2,
        6 => 5,
        7 => 10,
        8 => 20
    ];

    static private function getInsertedMoney(array $money)
    {
        $inserted = 0;
        foreach($money as $m => $qty) {
            if (! array_key_exists($m, self::$coins)) {
                throw new \InvalidArgumentException('Coin is not known');
            }
            $inserted = $inserted + ($qty * self::$coins[$m]);
        }

        return $inserted;

    }

    static private function getExchange($money, $output = '')
    {
        while(true) {
            foreach(array_reverse(self::$coins, true) as $k => $coin) {
                if ($coin <= $money) {
                    var_dump($k . ' 1');
                    exit;

                    self::getExchange($money - $coin, $k . ' 1');
                }
            }
        }
        return $output;
    }

    static public function buy($input)
    {
        $input = json_decode($input);
        if ($input === false) {
            return self::ERROR_NOT_VALID_JSON;
        }

        if (! array_key_exists($input->product_code, self::$products)) {
            return self::ERROR_PRODUCT_CODE;
        }

        $productPrice = self::$products[$input->product_code];
        $insertedMoney = self::getInsertedMoney($input->inserted_money);
        if ($productPrice > $insertedMoney) {
            return self::ERROR_NOT_ENOUGH_MONEY;
        }

        $output = self::getExchange($insertedMoney - $productPrice);
        var_dump($output);
        exit;

    }

} 