<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Kelurahan;
use Alfa6661\AutoNumber\AutoNumberTrait;

class Pasien extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    public $incrementing = false;
    public $keyType = 'string';
    public $timestamps = true;
    protected $table = "pasien";
    public function getAutoNumberOptions()
    {
        return [
            'id' =>[
                'format' => date('YM'),
                'length' => 6,
            ]
        ];
    }
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
