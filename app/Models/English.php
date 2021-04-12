<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class English extends Model
{
    use HasFactory;

     protected $table = 'englishes';
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
        'updated_at'
    ];




}
