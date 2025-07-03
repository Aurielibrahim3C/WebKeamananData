<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    protected $table = 'dosens';
    protected $primaryKey = 'id_dosen';

    protected $fillable = [
        'nidn',
        'nama',
        'gender',
        'tempat_lahir',
        'tgl_lahir',
        'password',
        'pendidikan',
        'id_jabatan',
        'id_prodi',
        'id_jurusan',
        'id_golongan',
        'alamat',
        'email',
        'no_hp',
        'foto',
        'sinta',
        'link_sinta',
        'schoolar',
        'status'
    ];


    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    // Relasi ke tabel lain
    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class, 'id_jurusan', 'id_jurusan');
    }
    public function bidang()
    {
        return $this->belongsTo(Jurusan::class, 'id_bidang', 'id_bidang');
    }

    public function prodi()
    {
        return $this->belongsTo(Prodi::class, 'id_prodi', 'id_prodi');
    }

    public function jabatan()
    {
        return $this->belongsTo(Jabatan::class, 'id_jabatan', 'id_jabatan');
    }

    public function golongan()
    {
        return $this->belongsTo(Golongan::class, 'id_golongan', 'id_golongan');
    }


}
