<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable=[
      'nama_tugas',
      'id_kategori',
      'keterangan_tugas',
      'status_tugas' 
    ];
}