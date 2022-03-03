<?php

use Illuminate\Database\Seeder;

class TestUsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'username' => 'ユーザー',
            'mail' => 'user@test.mail',
            'password' => bcrypt('123456'),
        ]);
    }
}
