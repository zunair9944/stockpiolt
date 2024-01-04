<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\HasMedia;
use App\Models\TagsModel;
class NewsModel extends Model implements HasMedia
{
    use HasFactory, SoftDeletes, InteractsWithMedia;
    protected $softDelete = true;
    protected $table = 'news';
    protected $fillable = ['title', 'tag_id', 'slug', 'description', 'post', 'status', 'mataTitle', 'mataDescription', 'mataTags', 'user_id'];
    public function tags()
    {
        return $this->belongsTo(TagsModel::class);
    }
}
