<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class parkir extends Model
{
    use HasFactory;

    protected $fillable = [
        'nomer_polisi',
        'waktu_masuk',
        'waktu_keluar',
        'area_id'
    ];
}
