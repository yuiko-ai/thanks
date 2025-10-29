<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Ngword;
use Illuminate\Database\Seeder;

class NgWordSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Ngword::insert([
            ['word' => 'バカ', 'created_at' => now(), 'updated_at' => now()],
            ['word' => 'アホ', 'created_at' => now(), 'updated_at' => now()],
            ['word' => '死ね', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
