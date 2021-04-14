<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class English extends Model
{
    use HasFactory;

    protected $table = 'english';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id', 'addition_id',
        'english',
        'transcription',
        'past_simp',
        'transcription2',
        'past_part',
        'transcription3',
        'meaning4',
        'transcription4',
        'mark_except',
        'еxplanation',
        'lesson_num',
        'created_at',
        'updated_at',
    ];

    public static function enWordsList($char, $lim)
    {
        $en = array();

        $words = DB::table('english')
            ->select('english')
            ->distinct()
            ->where('english', 'LIKE', $char)
            ->orderBy('english')
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

        $words = self::join('english_russian', 'english.id', '=', 'english_russian.english_id')
            ->join('russian', 'russian.id', '=', 'english_russian.russian_id')
            ->wherein('english.english', $english)
            ->orderBy('english')
            //->paginate(15);
            ->get()
            ->toArray();

        return $words;
    }

    public static function saveNewWord($request)
    {
        self::create($request->all());
        $max = self::max('id');

        for ($i = 1; $i <= 4; $i++) {
            if ($request->{'russian' . $i}) {
                $russians = Russian::create(['russian' => $request->{'russian' . $i},
                    'part_of_speech' => $request->{'part_of_speech' . $i}]);
                $russians->englishes()->attach($max);
            }
        }
    }


}
