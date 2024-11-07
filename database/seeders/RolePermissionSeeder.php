<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Permission
        // admin
        Permission::create(['name' => 'tambah-user']);
        Permission::create(['name' => 'edit-user']);
        Permission::create(['name' => 'hapus-user']);
        Permission::create(['name' => 'lihat-user']);

        Permission::create(['name' => 'tambah-tiket']);
        Permission::create(['name' => 'edit-tiket']);
        Permission::create(['name' => 'hapus-tiket']);
        Permission::create(['name' => 'lihat-tiket']);

        // client
        Permission::create(['name' => 'lihat-penjualan']);
        Permission::create(['name' => 'print-HasilPenjualan']);

        // pengunjung
        Permission::create(['name' => 'edit-profil']);
        Permission::create(['name' => 'print-tiket']);
        Permission::create(['name' => 'beli-tiket']);
        Permission::create(['name' => 'lihat-produk']);

        // role
        Role::create(['name' => 'admin']);
        Role::create(['name' => 'client']);
        Role::create(['name' => 'pengunjung']);

        // set-up Role
        $roleAdmin = Role::findByName('admin');
        // user
        $roleAdmin->givePermissionTo('tambah-user');
        $roleAdmin->givePermissionTo('edit-user');
        $roleAdmin->givePermissionTo('hapus-user');
        $roleAdmin->givePermissionTo('lihat-user');
        // tiket
        $roleAdmin->givePermissionTo('tambah-tiket');
        $roleAdmin->givePermissionTo('edit-tiket');
        $roleAdmin->givePermissionTo('hapus-tiket');
        $roleAdmin->givePermissionTo('lihat-tiket');

        // User
        $rolePengunjung = Role::findByName('pengunjung');
        $rolePengunjung->givePermissionTo('edit-profil');
        $rolePengunjung->givePermissionTo('print-tiket');
        $rolePengunjung->givePermissionTo('beli-tiket');
        $rolePengunjung->givePermissionTo('lihat-produk');

        $roleClient = Role::findByName('client');
        $roleClient->givePermissionTo('lihat-penjualan');
        $roleClient->givePermissionTo('print-HasilPenjualan');
    }
}
