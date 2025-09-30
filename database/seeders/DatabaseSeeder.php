<?php

declare(strict_types=1);

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // 部署を直接DBに挿入（Factoryを使わない）
        DB::table('departments')->insert([
            ['name' => 'ちいかわ課', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'ディズニー課', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'サンリオ課', 'created_at' => now(), 'updated_at' => now()],
        ]);

        // ランダムユーザーを10人作成
        User::factory(10)->create();

        // 特定のテストユーザーを作成
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'department' => 1,
        ]);

        // 必要に応じてコメントアウトを外して使用

        User::factory()->create([
            'name' => 'Maeda Masamune',
            'email' => 'masamune.maeda@arsaga.jp',
            'department' => 3,
        ]);

        User::factory()->create([
            'name' => 'Tsukino Yamako',
            'email' => 'yamako.tsukino@arsaga.jp',
            'department' => 3,
        ]);

        User::factory()->create([
            'name' => 'Yuiko Aizawa',
            'email' => 'yuiko.aizawa@arsaga.jp',
            'department' => 2,
        ]);

        User::factory()->create([
            'name' => 'Shimizu Aya',
            'email' => 'aya.shimizu@arsaga.jp',
            'department' => 1,
        ]);

        User::factory()->create([
            'name' => 'Kawashita Kotako',
            'email' => 'kotako.kawashita@arsaga.jp',
            'department' => 3,
        ]);

        User::factory()->create([
            'name' => 'Matsuzaki Kouhei',
            'email' => 'kouhei.matsuzaki@arsaga.jp',
            'department' => 1,
        ]);

    }
}


















