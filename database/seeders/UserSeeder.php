<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $admin = User::create([
        //     'name' => 'admin',
        //     'email' => 'admin@mail.com',
        //     'password' => bcrypt('12345678')

        // ]);
        // $admin->assignRole('admin');

        $pengunjung = User::create([
            'name' => 'test',
            'email' => 'test@mail.com',
            'password' => bcrypt('12345678')

        ]);
        $pengunjung->assignRole('pengunjung');

        // $client = User::create([
        //     'name' => 'client',
        //     'email' => 'client@mail.com',
        //     'password' => bcrypt('12345678')

        // ]);
        // $client->assignRole('client');
    }
}
