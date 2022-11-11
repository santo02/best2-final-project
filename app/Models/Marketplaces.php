<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Marketplaces extends Model
{
    protected $fillable = [
        'tingkat_keberhasilan',
        'nama_perusahaan',
        'industri',
        'jumlah_pinjaman',
        'pinjaman_terkumpul',
        'metode_pengembalian',
        'jatuh_tempo',
        'jangka_waktu',
    ];

    protected $guarded = [];
}
