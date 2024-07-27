<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'username' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('12345678'),
            'id_role' => 1,
        ]);

        User::create([
            'name' => 'Karyawan',
            'username' => 'karyawan',
            'email' => 'karyawan@gmail.com',
            'password' => Hash::make('12345678'),
            'id_role' => 2,
        ]);
        // // Membuat pengguna administrator
        // $admin = User::first();
        // $admin->name = 'Administrator';
        // $admin->username = 'admin';
        // $admin->email = 'admin@gmail.com';
        // $admin->id_role = 1;
        // $admin->save();

        // // Membuat pengguna karyawan
        // $karyawan = User::factory()->create([
        //     'name' => 'Karyawan',
        //     'username' => 'karyawan',
        //     'email' => 'karyawan@gmail.com',
        //     'id_role' => 2,
        // ]);
    }
}
