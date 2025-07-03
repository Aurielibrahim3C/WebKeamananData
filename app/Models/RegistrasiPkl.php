<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegistrasiPkl extends Model
{
    use HasFactory;

    protected $table = 'registrasi_pkl';
    protected $primaryKey = 'id_registrasi_pkl';
    protected $fillable = [
        'id_mhs',
        'id_tempat_pkl',
        'alamat_perusahaan',
        'file',
        'pembimbing_id',
        'konfirmasi',
    ];

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'id_mhs');
    }

    public function tempatPkl()
    {
        return $this->belongsTo(TempatPkl::class, 'id_tempat_pkl');
    }

    public function pembimbing()
    {
        return $this->belongsTo(Dosen::class, 'pembimbing_id');
    }
}
