<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class antrian extends Model
{
    protected $fillable= [
        'no_antrian',
        'nama_antrian',
        'alamat_pengantri'
    ];
}
