<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Russian extends Model
{
    use HasFactory;

    protected $table = 'russians';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id', 'russian', 'part_of_speech', 'created_at', 'updated_at'
    ];


}
