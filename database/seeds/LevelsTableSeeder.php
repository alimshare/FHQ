<?php

use Illuminate\Database\Seeder;

class LevelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('level')->insert([
            'nama' => 'Baghdadiyah',
            'deskripsi' => ''
        ]);
        DB::table('level')->insert([
            'nama' => 'Tahsin 1',
            'deskripsi' => ''
        ]);
        DB::table('level')->insert([
            'nama' => 'Tahsin 2',
            'deskripsi' => ''
        ]);
        DB::table('level')->insert([
            'nama' => 'Takhasus',
            'deskripsi' => ''
        ]);
        DB::table('level')->insert([
            'nama' => 'Tahfidz',
            'deskripsi' => ''
        ]);
        DB::table('level')->insert([
            'nama' => 'Bahasa Arab',
            'deskripsi' => ''
        ]);
    }
}
