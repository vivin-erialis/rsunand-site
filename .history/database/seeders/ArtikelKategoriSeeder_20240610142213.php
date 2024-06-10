<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArtikelKategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        // Tambahkan data ke dalam tabel menggunakan metode insert()
        DB::table('kategori_artikels')->insert([
            [
                'title' => 'Berita',
                'desc' => ''
            ],
            [
                'title' => 'Informasi',
                'desc' => ''
            ],
            [
                'title' => 'Karir',
                'desc' => ''
            ],
            [
                'title' => 'Ilmiah',
                'desc' => ''
            ],
            [
                'title' => 'Penyakit & Pengobatan',
                'desc' => ''
            ],
            [
                'title' => 'Bagian & Instalasi',
                'desc' => ''
            ],
            [
                'title' => 'Pendidikan & Penelitian',
                'desc' => ''
            ],

            // Tambahkan data lainnya sesuai kebutuhan
        ]);
    }
}
