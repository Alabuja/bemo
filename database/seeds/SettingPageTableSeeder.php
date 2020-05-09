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
                'email_address' => 'jennifer@bemoacademicconsulting.com',
            ],
            [
                'email_address' => 'careers@bemoacademicconsulting.com',
            ]
        ]);
    }
}
