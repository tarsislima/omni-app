<?php

use Illuminate\Database\Seeder;

class ChannelsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rows = [
            [
                'name' => 'Email',
                'slug' => 'email',
            ],
            [
                'name' => 'Instagram',
                'slug' => 'instagram',
            ],
            [
                'name' => 'Whatsapp',
                'slug' => 'whatsapp',
            ],
            [
                'name' => 'Twitter',
                'slug' => 'twitter',
            ],
            [
                'name' => 'Facebook',
                'slug' => 'facebook',
            ]
        ];

        foreach ($rows as $data) {
            DB::table('channels')->insert($data);
        }
    }
}
