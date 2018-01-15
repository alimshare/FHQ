<?php

use Illuminate\Database\Seeder;

class SantriTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('santri')->insert([
            'nomor_induk' => '0000000001',
            'nama' => 'Angga Satria Laksana',
            'jenis_kelamin' => 'L'
        ]);
        DB::table('santri')->insert([
            'nomor_induk' => '0000000002',
            'nama' => 'Abdullah Alim',
            'jenis_kelamin' => 'L'
        ]);
        DB::table('santri')->insert([
            'nomor_induk' => '0000000003',
            'nama' => 'Hairil Fiqri Sulaiman',
            'jenis_kelamin' => 'L'
        ]);
    }
}
