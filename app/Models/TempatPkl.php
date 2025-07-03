<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TempatPkl extends Model
{
    use HasFactory;

    protected $table = 'tempat_pkl'; // The name of the table
    protected $primaryKey = 'id_tempat_pkl'; // Custom primary key
    public $timestamps = true; // Enable timestamps

    // Define the fillable attributes for mass assignment
    protected $fillable = [
        'nama_perusahaan',
        'alamat_perusahaan',
        'kuota',
        'status',
    ];
}
