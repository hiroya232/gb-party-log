<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $names = [
            'hiroya' => 'ヒロヤ',
        ];

        foreach ($names as $name_en => $name_jp) {

            User::create([
                'name' => $name_jp, // ユーザー名
                'email' => $name_en . '@example.com', // 👈 メールアドレス
                'password' => bcrypt('xxxxxxxx') // 👈 パスワード
            ]);
        }
    }
}
