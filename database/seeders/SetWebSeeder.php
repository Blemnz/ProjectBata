<?php

namespace Database\Seeders;

use App\Models\SetWeb as ModelsSetWeb;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SetWebSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ModelsSetWeb::create([
            'judul1' => 'BATARINGAN BANDUNG PROMO HARGA 495.000/M3 Pembayaran COD',
            'judul2' => 'MINIMAL PEMESANAN 12,6 KUBIK KIRIMAN LANGSUNG PABRIK',
            'judul3' => 'GRADE A',
            'judul4' => 'KAMI DISTRIBUTOR BATARINGAN UNTUK MELAYANI WILAYAH JAWA BARAT',
            'judul5' => 'BEKASI CIKARANG CIBITUNG KARAWANG BANDUNG SUBANG CIKAMPEK PURWAKARTA GARUT TASIKMALAYA',
            'judul6' => '085797845026',
            'map' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d126748.5640042464!2d107.560754373908!3d-6.903442379219481!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e6398252477f%3A0x146a1f93d3e815b2!2sBandung%2C%20Bandung%20City%2C%20West%20Java!5e0!3m2!1sen!2sid!4v1724058782706!5m2!1sen!2sid" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>',
            'kontakEmail' => 'example@email.com',
            'kontakNomor' => '123123',
            'kontakAlamat' => 'jalan'
        ]);
    }
}
