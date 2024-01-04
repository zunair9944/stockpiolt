<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\HasMedia;
class TeamModel extends Model implements HasMedia
{
    use HasFactory, SoftDeletes, InteractsWithMedia;
    protected $softDelete = true;
    protected $table = 'team';
    protected $fillable = ['name', 'dsignation', 'slug', 'description', 'status', 'mataTitle', 'mataDescription', 'mataTags', 'user_id'];
}
