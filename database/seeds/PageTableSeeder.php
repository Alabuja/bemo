<?php

use Illuminate\Database\Seeder;

class PageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pages')->insert([
            [
                'page_name' => 'Home',
                'page_url' =>  'index'
            ],
            [
                'page_name' => 'Contact Us',
                'page_url' => 'contact'
            ]
        ]);
    }
}
