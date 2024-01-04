<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class FaqsModel extends Model
{
    use HasFactory, SoftDeletes;
    protected $softDelete = true;
    protected $table = 'faq';
    protected $fillable = ['question', 'answer', 'faq_head_id', 'faq_subhead_id', 'status', 'user_id'];

}
