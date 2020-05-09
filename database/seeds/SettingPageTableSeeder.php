<?php

use Illuminate\Database\Seeder;

class SettingPageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings')->insert([
            [
                'email_address' => 'jennifer@bemoa.com',
            ],
            [
                'email_address' => 'note@bemoa.com',
            ]
        ]);
    }
}
