<?php

namespace Database\Seeders;

use App\Models\banner;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class bannerseed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        banner::create([
            'judul' => 'FEST polaasddawwddawdawjdddddkajs',
            'deskripsi' => 'please subs to koyuki channelasssssss
            adwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwww
            dwaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa
            adwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwww',
            'image' => 'kokoyuddddddddwdwddki.jpg'
        ]);
    }
}
