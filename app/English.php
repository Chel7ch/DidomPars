<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class English extends Model
{
    protected $table = 'englishes';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id', 'addition_id', 'english', 'transcription', 'past_simp', 'transcription2', 'past_part', 'transcription3', 'meaning4', 'transcription4', 'mark_except', 'еxplanation', 'lesson_num', 'created_at', 'updated_at'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
//    public function russians()
//    {
//        return $this->belongsToMany(Russian::class);
//    }

    public static function alphabetSign($sign)
    {
        $sign = substr(strtolower(htmlentities($sign)), 0, 1);
        (97 <= ord($sign) and ord($sign) <= 122) ? $sign = $sign . "%" : $sign = 'a%';
        return $sign;
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

        foreach ($words as $word) {
            $en[] = $word->english;
        }
        return $en;
    }

    public static function enWord($english)
    {
        if (is_string($english)) $english = explode(' ', $english);

        $words = self::join('english_russian', 'englishes.id', '=', 'english_russian.english_id')
            ->join('russians', 'russians.id', '=', 'english_russian.russian_id')
            ->wherein('englishes.english', $english)
            //->paginate(15);
            ->get();
        $words = json_decode(json_encode($words), true);

        return $words;
    }

    public static function enWordAnotherMeaning($english)
    {
        $en = self::enWord($english);
//        $en = $english;

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
