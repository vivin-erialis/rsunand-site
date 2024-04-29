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
        DB::table('example_table')->insert([
            [
                'title' => 'Berita',
                'desc' => 'Deskripsi untuk judul pertama.'
            ],
            [
                'title' => 'Ilmiah',
                'desc' => 'Deskripsi untuk judul kedua.'
            ],
            // Tambahkan data lainnya sesuai kebutuhan
        ]);
    }
}
