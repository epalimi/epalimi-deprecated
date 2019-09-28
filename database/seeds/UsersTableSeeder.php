<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * Initiate admin users.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => '변찬혁',
            'email' => 'bdu00chch@naver.com',
            'password' => bcrypt('chan0819@@'),
        ]);
        DB::table('users')->insert([
            'name' => '김정미',
            'email' => 'gongricoop@gmail.com',
            'password' => bcrypt('7648atsa!@#'),
        ]);
    }
}
