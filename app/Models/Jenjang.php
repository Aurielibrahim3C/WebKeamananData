<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jenjang extends Model
{
    use HasFactory;

    protected $table = 'jenjang'; // Nama tabel
    protected $primaryKey = 'id_jenjang'; // Primary key

    // Kolom-kolom yang bisa diisi melalui mass assignment
    protected $fillable = [
        'nama_jenjang',
        'keterangan',
    ];
}
