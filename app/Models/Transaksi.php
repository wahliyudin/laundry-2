<?php

namespace App\Models;

use App\Enums\Status;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $table = 'transaksi';

    protected $fillable = [
        'kode',
        'tanggal_masuk',
        'tanggal_ambil',
        'konsumen_id',
        'paket_id',
        'berat',
        'status',
    ];

    protected $casts = [
        'status' => Status::class
    ];

    public function konsumen()
    {
        return $this->belongsTo(Konsumen::class, 'konsumen_id', 'id');
    }

    public function paket()
    {
        return $this->belongsTo(Paket::class, 'paket_id', 'id');
    }
}
