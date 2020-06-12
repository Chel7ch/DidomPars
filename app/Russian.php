<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Russian extends Model
{
    protected $table = 'russians';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id', 'russian', 'part_of_speech', 'created_at', 'updated_at'
    ];

    public static function ruWordsList($char, $lim)
    {
        $words = DB::table('russians')
            ->select('russian')
            ->where('russian', 'LIKE', $char)
            ->orderBy('russian')
            //->where('lesson_num','>',-1 )
            //->where('lesson_num','<',600)
            ->take($lim)
//            ->paginate(5);
            ->get();

        foreach ($words as $word) {
            $ru[] = $word->russian;
        }
        return $ru;
    }

    public static function ruWord($russian)
    {
        if (is_string($russian)) $russian = explode(' ', $russian);

        $words = self::join('english_russian', 'russians.id', '=', 'english_russian.russian_id')
            ->join('englishes', 'englishes.id', '=', 'english_russian.english_id')
            ->wherein('russians.russian', $russian)
            //->paginate(15);
            ->get();
        $words = json_decode(json_encode($words), true);

        return $words;
    }

    public static function ruWordAnotherMeaning($russian)
    {
        $en = self::ruWord($russian);

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
