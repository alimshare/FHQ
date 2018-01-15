<?php

use Illuminate\Database\Seeder;

class PengajarTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pengajar')->insert([
            'nomor_induk' => '1000000001',
            'nama' => 'Agung Alhaz',
            'jenis_kelamin' => 'L'
        ]);
        DB::table('pengajar')->insert([
            'nomor_induk' => '1000000002',
            'nama' => 'Anam',
            'jenis_kelamin' => 'L'
        ]);
        DB::table('pengajar')->insert([
            'nomor_induk' => '1000000003',
            'nama' => 'Mujahidin',
            'jenis_kelamin' => 'L'
        ]);
    }
}
