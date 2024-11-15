<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tiket extends Model
{
    use HasFactory;

    protected $table = 'tiket_desc';

    protected $fillable = [
        'id_tiket',
        'name',
        'harga',
        'deskripsi',
        'image',

    ];
}
