<?php

namespace App\Services;

class PrepearingOutputService
{
    public static function eng($words)
    {
        for ($a = 0, $cou = count($words); $a < $cou; $a++) {

            if (isset($words[$a]['english'])) {
                $words[$a]['word'] = $words[$a]['english'];
                $words[$a]['translation'] = $words[$a]['russian'];
                unset($words[$a]['english'], $words[$a]['russian']);
            }

            for ($b = $a + 1; $b < $cou; $b++) {
//                 unset($words[$i]['еxplanation']);//111111111111111111111111111111111111
                if (isset($words[$a], $words[$b]) && $words[$a]['word'] === $words[$b]['english']) {
                    $c = $b - $a + 1;
                    $words[$a]['translation' . $c] = $words[$b]['russian'];
                    $words[$a]['part_of_speech' . $c] = $words[$b]['part_of_speech'];
                    $words[$a]['count'] = $c;
                    unset($words[$b]);

                } else break;
            }
        }
        return json_decode(json_encode($words));
    }

    public static function rus($words)
    {
        for ($a = 0, $cou = count($words); $a < $cou; $a++) {

            if (isset($words[$a]['russian'])) {
                $words[$a]['word'] = $words[$a]['russian'];
                $words[$a]['translation'] = $words[$a]['english'];
                unset($words[$a]['english'], $words[$a]['russian']);
            }

            for ($b = $a + 1; $b < $cou; $b++) {
//                 unset($words[$i]['еxplanation']);//111111111111111111111111111111111111
                if (isset($words[$a], $words[$b]) && $words[$a]['word'] === $words[$b]['russian']) {
                    $c = $b - $a + 1;
                    $words[$a]['translation' . $c] = $words[$b]['english'];
                    $words[$a]['part_of_speech' . $c] = $words[$b]['part_of_speech'];
                    $words[$a]['count'] = $c;
                    unset($words[$b]);

                } else break;
            }
        }
        return json_decode(json_encode($words));
    }

}
