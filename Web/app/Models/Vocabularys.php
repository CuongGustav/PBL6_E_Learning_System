<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vocabularys extends Model
{
    use HasFactory;
    protected $fillable = [
        
        'name_voca',
        'transcribe_phonetically',
        'meaning',
        'example',
        'image_voca',
        'id_topic',
        'favourite',
    ];
}
