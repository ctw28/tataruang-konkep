<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        DB::table('roles')->insert([
            ['role_nama'=>'admin'],
            ['role_nama'=>'user']
        ]);
        DB::table('jabatans')->insert([
            ['jabatan_nama'=>'Administator','jabatan_singkatan'=>'Admin'],
            ['jabatan_nama'=>'Kepala Dinas','jabatan_singkatan'=>'Kadis']
        ]);

        DB::table('users')->insert([
            ['username'=>'admin','email'=>'admin@mail.com','password'=>bcrypt('1234qwer'),'role_id'=>1,'jabatan_id'=>1, 'is_aktif'=>"1"],
            ['username'=>'kadis','email'=>'kadis@mail.com','password'=>bcrypt('1234qwer'),'role_id'=>2,'jabatan_id'=>2, 'is_aktif'=>"1"],
        ]);

        DB::table('dokumen_kategoris')->insert([
            ['dokumen_kategori_nama'=>'Peraturan','dokumen_kategori_slug'=>'peraturan','dokumen_kategori_keterangan'=>'Peraturan'],
            ['dokumen_kategori_nama'=>'Lainnya','dokumen_kategori_slug'=>'lainnya','dokumen_kategori_keterangan'=>'Lainnya'],
        ]);
    }
}
