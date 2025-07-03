<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    // Define the table associated with the model
    protected $table = 'mahasiswa';

    // Specify the primary key if it's not the default 'id'
    protected $primaryKey = 'id_mhs';

    // Define the fillable columns
    protected $fillable = [
        'nim',
        'nama',
        'id_prodi',
        'id_jurusan',
        'user_id',
        'gender',
        'foto',
        'tanggal_daftar',
        'password',
        'akses',
    ];

    // Define relationships if needed
    public function prodi()
    {
        return $this->belongsTo(Prodi::class, 'id_prodi');
    }

    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class, 'id_jurusan');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
