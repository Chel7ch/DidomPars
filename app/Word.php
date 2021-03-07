<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Word extends Model
{
    protected $table = 'words';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id', 'english', 'transcription', 'past_simp', 'transcription2', 'past_part', 'transcription3', 'meaning4', 'transcription4', 'mark_except', 'part_of_speech', 'russian', 'part_of_speech2', 'russian2', 'part_of_speech3', 'russian3', 'part_of_speech4', 'russian4', 'description', 'img_words', 'lesson_num', 'created_at', 'updated_at'
    ];
    protected $dates=['published_at'];

}
