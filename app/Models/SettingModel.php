<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\HasMedia;

class SettingModel extends Model  implements HasMedia
{

    use HasFactory, SoftDeletes, InteractsWithMedia;
    protected $softDelete = true;
    protected $table = 'settings';
    protected $fillable =  ['country', 'address', 'phone', 'email','map','image'];

}