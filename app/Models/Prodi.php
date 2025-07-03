<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prodi extends Model
{
    use HasFactory;

    protected $table = 'prodi';

    protected $primaryKey = 'id_prodi';

    protected $fillable = [
        'id_jurusan',
        'nama_prodi',
        'id_jenjang',
    ];

    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class, 'id_jurusan');
    }

    public function jenjang()
    {
        return $this->belongsTo(Jenjang::class, 'id_jenjang');
    }
}
