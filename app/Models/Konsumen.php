<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Konsumen extends Model
{
    use HasFactory;

    protected $table = 'konsumen';

    protected $fillable = [
        'kode',
        'nama',
        'alamat',
        'no_hp',
    ];

    public function transaksi()
    {
        return $this->hasMany(Transaksi::class, 'konsumen_id', 'id');
    }
}
