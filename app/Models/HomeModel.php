<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeModel extends Model
{
    use HasFactory;
    protected $table = 'homepage';
    protected $fillable = ['body', 'user_id', 'mataTitle', 'mataDescription', 'mataTags'];
}