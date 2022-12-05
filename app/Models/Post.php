<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
<<<<<<< HEAD

    protected $guarded = ['id'];

    public function category(){
      // Satu post punya satu kategori
      return $this->belongsTo(Category::class);
    }
=======
>>>>>>> 411eb12fd4aa019bac637ad4bf73a0d3e3e3355a
}
