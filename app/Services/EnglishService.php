<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;

Class EnglishService
{

    public static function alphabetSign($sign)
    {
        $sign = substr(strtolower(htmlentities($sign)), 0, 1);
        (97 <= ord($sign) and ord($sign) <= 122) ? $sign = $sign . "%" : $sign = 'a%';
        return $sign;
    }

    public static function getEnWords($char, $lim)
    {
        $words = EnglishService::enWordsList($char, $lim);
        $en = json_decode(json_encode($words), true);
        $en = EnglishService::enWordAnotherMeaning($en);
        $words = json_decode(json_encode($en));
        return $words;
    }

    public static function enWordsList($char, $lim)
    {
        $words = DB::table('englishes')
            ->select('english')
            ->where('english', 'LIKE', $char)
//            ->orderBy('english')
            //->where('lesson_num','>',-1 )
            //->where('lesson_num','<',600)
            ->take($lim)
//            ->paginate(5);
            ->get();
        //$words = DB::select('SELECT english FROM en_words WHERE english LIKE ? LIMIT ?',[$char,$lim]);
        foreach ($words as $word) $en[] = $word->english;

        $words = DB::table('englishes')
            ->join('english_russian', 'englishes.id', '=', 'english_russian.english_id')
            ->join('russians', 'russians.id', '=', 'english_russian.russian_id')
            ->whereIn('englishes.english', $en)
            //->paginate(15);
            ->get();

        return $words;
    }

    public static function enWordAnotherMeaning($en)    {
        for ($i = 0, $cou = count($en); $i < $cou; $i++) {
            for ($ii = $i + 1; $ii < $cou; $ii++) {
//                 unset($en[$i]['еxplanation']);//111111111111111111111111111111111111
                if (isset($en[$i], $en[$ii]) && $en[$i]['english'] === $en[$ii]['english']) {
                    $iii = $ii - $i + 1;
                    $en[$i]['count'] = $iii;
                    $en[$i]['russian' . $iii] = $en[$ii]['russian'];
                    unset($en[$ii]);
                }
            }
        }
        return $en;
    }
}
