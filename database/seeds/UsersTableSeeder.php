<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->command->question('创建一个管理员用户...');
        $name = $this->command->ask('用户名:', "Aleutian Xie");
        $email = $this->command->ask('邮箱:', "aleutian.xie@cicisoft.cn");
        $password = $this->command->secret("密码:");
        $password = password_hash($password, PASSWORD_BCRYPT);
        $created_at = date('Y-m-d H:i:s', time());
        $updated_at = date('Y-m-d H:i:s', time());
        DB::table('users')->insert(compact('name', 'email', 'password', 'created_at', 'updated_at'));
        $this->command->info('创建管理员完成!');
    }
}
