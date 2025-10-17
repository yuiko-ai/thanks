<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Department;
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
        // DB::table('departments')->insert([
        //     ['name' => 'ちいかわ課', 'created_at' => now(), 'updated_at' => now()],
        //     ['name' => 'ディズニー課', 'created_at' => now(), 'updated_at' => now()],
        //     ['name' => 'サンリオ課', 'created_at' => now(), 'updated_at' => now()],
        // ]);

        Department::insert([
            ['name' => 'ちいかわ課', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'ディズニー課', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'サンリオ課', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'ポケモン課', 'created_at' => now(), 'updated_at' => now()]
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
            'name' => '前田将宗',
            'email' => 'masamune.maeda@arsaga.jp',
            'department' => 3,
        ]);

        User::factory()->create([
            'name' => '月野やま子',
            'email' => 'yamako.tsukino@arsaga.jp',
            'department' => 3,
        ]);

        User::factory()->create([
            'name' => '相澤由依子',
            'email' => 'yuiko.aizawa@arsaga.jp',
            'department' => 2,
        ]);

        User::factory()->create([
            'name' => '清水綾',
            'email' => 'aya.shimizu@arsaga.jp',
            'department' => 1,
        ]);

        User::factory()->create([
            'name' => '川下小太郎',
            'email' => 'kotako.kawashita@arsaga.jp',
            'department' => 3,
        ]);

        User::factory()->create([
            'name' => '松崎航平',
            'email' => 'kouhei.matsuzaki@arsaga.jp',
            'department' => 1,
        ]);

        User::factory()->create([
            'name' => '瀬戸口ふうが',
            'email' => 'ksetouchi@arsaga.jp',
            'department' => 4,
        ]);

    }
}


















