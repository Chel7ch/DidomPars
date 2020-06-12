<?php

namespace App\Services;

class PrepearingOutputService
{
    public static function eng($english)
    {
        $en = self::enWord($english);

        for ($i = 0, $cou = count($en); $i < $cou; $i++) {
            for ($ii = $i + 1; $ii < $cou; $ii++) {
//                 unset($en[$i]['еxplanation']);//111111111111111111111111111111111111
                if (isset($en[$i], $en[$ii]) && $en[$i]['english'] === $en[$ii]['english']) {
                    $iii = $ii - $i + 1;
                    $en[$i]['count'] = $iii;
                    $en[$i]['russian' . $iii] = $en[$ii]['russian'];
                    $en[$i]['part_of_speech' . $iii] = $en[$ii]['part_of_speech'];
                    unset($en[$ii]);
                }
            }
        }
        return json_decode(json_encode($en));
    }


}
