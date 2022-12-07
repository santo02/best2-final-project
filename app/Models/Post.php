<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DateTimeInterface;

class Post extends Model
{
  protected function serializeDate(DateTimeInterface $date) {
    return $date->format('Y-m-d H:i:s');
  }
  public function category(){
    // Satu post punya satu kategori
    return $this->belongsTo(Category::class);
  }

}
