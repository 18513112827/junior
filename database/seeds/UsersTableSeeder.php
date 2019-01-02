<?php

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
        $users = factory(\App\Models\User::class)->times(50)->make();
        //print_r($users->makeVisible(['password', 'remember_token'])->toArray());die;
        User::insert($users->makeVisible(['password', 'remember_token'])->toArray());

        $user = User::find(1);
        $user->name = 'fansheng';
        $user->email = 'fansheng0594@163.com';
        $user->password = bcrypt('123456');
        $user->is_admin = true;
        $user->save();
    }
}
