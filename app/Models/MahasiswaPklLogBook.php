<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MahasiswaPklLogBook extends Model
{
    use HasFactory;

    protected $table = 'mahasiswa_pkl_log_book';
    protected $primaryKey = 'id_mahasiswa_pkl_log_book';
    protected $fillable = [
        'id_registrasi_pkl',
        'tanggal_kegiatan_awal',
        'tanggal_kegiatan_akhir',
        'kegiatan',
        'file_dokumentasi',
        'komentar',
        'validasi'
    ];

    // Relationship with RegistrasiPkl
    public function registrasiPkl()
    {
        return $this->belongsTo(RegistrasiPkl::class, 'id_registrasi_pkl');
    }
}
