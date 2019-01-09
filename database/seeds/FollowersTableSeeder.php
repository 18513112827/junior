<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class FollowersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::all();
        $user = $users->first();
        $user_id = $user->id;

        // 获取去除掉 ID 为 1 的所用用户 ID 数组
        $followers = $users->slice($user_id);
        $follower_ids = $followers->pluck('id')->toArray();

        // 关注
        $user->follow($follower_ids);

        // 除了一号用户外其他用户都关注 1 号
        foreach ($followers as $follower) {
            $follower->follow($user_id);
        }
    }
}
