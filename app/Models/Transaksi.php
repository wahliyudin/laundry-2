<?php

namespace App\Models;

use App\Enums\Status;
use App\Enums\StatusBayar;
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
        'status_bayar',
        'jumlah_bayar',
        'status',
    ];

    protected $casts = [
        'status' => Status::class,
        'status_bayar' => StatusBayar::class,
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
