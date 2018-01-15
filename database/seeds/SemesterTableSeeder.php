<?php

use Illuminate\Database\Seeder;

class SemesterTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('semester')->insert([
            'nama' => 'XXII',
            'deskripsi' => 'Angkatan 22',
            'status' => 'ACTIVE'
        ]);
    }
}
