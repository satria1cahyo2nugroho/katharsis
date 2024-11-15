<?php

namespace Database\Seeders;

use App\Models\Tiket;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class tiket_seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tiket_desc = Tiket::create([
            'id_tiket' => 'weee',
            'name' => 'zjksjd',
            'harga' => 20000,
            'deskripsi' => 'tololllllllllllllllllllllllllllllllllllll',
            'image' => 'klijs'

        ]);
    }
}
