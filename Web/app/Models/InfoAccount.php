<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InfoAccount extends Model
{
    use HasFactory;
    protected $table = 'infoaccount';
    protected $fillable = [
        'fullname',
        'id_user', 
    ];
}
