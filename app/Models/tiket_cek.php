<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tiket_cek extends Model
{
    use HasFactory;

    protected $table = 'tiket_ceks';

    protected $fillable = [
        'nama',
        'harga',
        'code',
        'key',
    ];
}
