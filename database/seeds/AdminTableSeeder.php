<?php

use Illuminate\Database\Seeder;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([
            [
                'username' => 'admin',
                'password' => bcrypt('p@55w0rd')
            ],
            [
                'username' => 'bemo-test',
                'password' => bcrypt('p@55w0rd')
            ],
            [
                'username' => 'jennifer',
                'password' => bcrypt('p@55w0rd')
            ]
        ]);
    }
}
