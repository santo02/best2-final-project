<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DateTimeInterface;

class Comment extends Model
{
    protected function serializeDate(DateTimeInterface $date) {
        return $date->format('d M Y H:i');
    }
}
