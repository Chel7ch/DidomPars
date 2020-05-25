<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Russian extends Model
{
    protected $table = 'russians';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id', 'russian', 'part_of_speech', 'created_at', 'updated_at'
    ];
}
