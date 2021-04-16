<?php

namespace App\Services;

class FirstSymbolService
{
    public static function cleanGet($chr = '')
    {
        $sign = '';
        if (!empty($chr)) $sign = mb_substr(mb_strtoupper(htmlentities($chr)), 0, 1);

        return $sign;
    }

    public static function eng($chr = '')
    {
        $sign = self::cleanGet($chr);
        (65 <= ord($sign) && ord($sign) <= 90) ? $sign = $sign . "%" : $sign = 'a%';

        return $sign;
    }

    public static function rus($chr = '')
    {
        $sign = self::cleanGet($chr);
        (1040 <= mb_ord($sign) && mb_ord($sign) <= 1071) ? $sign = $sign . "%" : $sign = 'a%';

        return $sign;
    }

}
