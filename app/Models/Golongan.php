<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Golongan extends Model
{
    use HasFactory;

    protected $table = 'golongan';

    protected $primaryKey = 'id_golongan';

    protected $fillable = ['nama_golongan'];

    public $timestamps = true;
}
