<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'produk_id',
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
}
