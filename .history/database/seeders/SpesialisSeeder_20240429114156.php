<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SpesialisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
         // Tambahkan data ke dalam tabel menggunakan metode insert()
         DB::table('spesialiss')->insert([
            [
                'title' => 'Umum',
                'desc' => ''
            ],
            [
                'title' => 'Gigi & Mulut',
                'desc' => ''
            ],
            [
                'title' => 'Jantung',
                'desc' => ''
            ],
            [
                'title' => 'Bedah',
                'desc' => ''
            ],
            [
                'title' => 'Syaraf',
                'desc' => ''
            ],
            [
                'title' => 'Penyakit Dalam',
                'desc' => ''
            ],
            [
                'title' => 'Paru',
                'desc' => ''
            ],
            [
                'title' => 'Mata',
                'desc' => ''
            ],
            [
                'title' => 'THT',
                'desc' => ''
            ],
            [
                'title' => 'Bedah Mulut',
                'desc' => ''
            ],
            [
                'title' => 'Kulit & Kelamin',
                'desc' => ''
            ],
            [
                'title' => 'Kebidanan',
                'desc' => ''
            ],
            [
                'title' => 'Anak',
                'desc' => ''
            ],
            [
                'title' => 'Gizi',
                'desc' => ''
            ],
            [
                'title' => 'Psikosomatis',
                'desc' => ''
            ],
            [
                'title' => 'Psikologi',
                'desc' => ''
            ],
        ]);
    }
}
