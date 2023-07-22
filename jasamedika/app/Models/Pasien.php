<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Kelurahan;

class Pasien extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $table = "pasien";
    protected $fillable = [
        'id',
        'nama',
        'alamat',
        'no_telepon',
        'rt_rw',
        'kelurahan_id',
        'tanggal_lahir',
        'jenis_kelamin',
    ];

    public function kelurahan()
    {
        return $this->belongsTo(Kelurahan::class, 'kelurahan_id');
    }
}
