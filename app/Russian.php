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
        $ru = array();

        $words = DB::table('russians')
            ->select('russian')
            ->distinct()
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
            ->orderBy('russian')
            //->paginate(15);
            ->get()
            ->toArray();

        return $words;
    }


}
