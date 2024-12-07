<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Role;

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
        'user_id'

    ];
    public function role()
    {
        return $this->belongsTo(Role::class, 'user_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
