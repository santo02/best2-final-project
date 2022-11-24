<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected  $primaryKey = 'post_id';
    protected $fillable = [
        'company_id',
        'title',
        'category',
        'post_image',
        'post_detail',
        'user_id',
        'slug'
    ];    
}
