<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
    protected $table = 'questions';
    protected $fillable = [
        'Name_question',
        'Answer_A', 
        'Answer_B',
        'Answer_C',
        'Answer_D',
        'Answer_right',
        'id_test',
    ];
}
