<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
  public function category(){
    // Satu post punya satu kategori
    return $this->belongsTo(Category::class);
  }

}
