<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Topics extends Model
{
    use HasFactory;
    protected $fillable = [
        'name_topic',
        'describe_topic',
        'image_topic',
    ];
}
