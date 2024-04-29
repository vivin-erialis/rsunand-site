<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

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
                'title' => 'Ilmiah',
                'desc' => ''
            ],
            // Tambahkan data lainnya sesuai kebutuhan
        ]);
    }
}
