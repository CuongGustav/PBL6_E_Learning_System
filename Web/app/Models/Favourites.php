<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favourites extends Model
{
    use HasFactory;
    protected $table = 'favourite';
    protected $fillable = [
        'id_user',
        'id_voca',
        'favourite', 
    ];
}
