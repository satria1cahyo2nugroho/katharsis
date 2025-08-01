<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $table = 'transaksis';

    protected $fillable = [
        'user_id',
        'produk_id',
        'nama',
        'tiket_id',
        'harga',
        'status',
        'snap_token',
        'sha256'
    ];

    // In Transaksi.php (model)
    public function produkk()
    {
        return $this->belongsTo(Tiket::class, 'produk_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
