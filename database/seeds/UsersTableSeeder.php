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
    public function run() {
        $users = factory(User::class)->times(5)->make();
        User::insert($users->makeVisible(['password', 'remember_token'])->toArray());

        $user = User::find(1);
        $user->mobile = '13333333333';
        $user->email = '609671961@qq.com';
        $user->save();

        $user->assignRole('Founder');

        // 将 2 号用户指派为『管理员』
        $user = User::find(2);
        $user->assignRole('Maintainer');
    }
}
