<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use QuizyTableSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        
        $this->call(QuizyTableSeeder::class);
    }
}
