<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(LevelsTableSeeder::class);
        $this->call(SemesterTableSeeder::class);
        $this->call(PengajarTableSeeder::class);
        $this->call(SantriTableSeeder::class);
    }
}
