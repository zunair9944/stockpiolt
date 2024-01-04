<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\BlogsModel;
use App\Models\NewsModel;
class TagsModel extends Model
{
    use HasFactory, SoftDeletes;
    protected $softDelete = true;
    protected $table = 'tags';
    protected $fillable = ['tag', 'status', 'user_id'];

    public function news()
    {
        return $this->hasMany(NewsModel::class);
    }

}
