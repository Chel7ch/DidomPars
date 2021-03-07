<?php

namespace App\Services;

Class FirstSymbolService
{
    public static function cleanGet()
    {
        $sign = '';
        if (!empty($_GET['alf'])) $sign = mb_substr(mb_strtoupper(htmlentities($_GET['alf'])), 0, 1);

        return $sign;
    }

    public static function eng()
    {
        $sign = self::cleanGet();
        (65 <= ord($sign) && ord($sign) <= 90) ? $sign = $sign . "%" : $sign = 'a%';

        return $sign;
    }

    public static function rus()
    {
        $sign = self::cleanGet();
        (1040 <= mb_ord($sign) && mb_ord($sign) <= 1071) ? $sign = $sign . "%" : $sign = 'a%';

        return $sign;
    }

}
