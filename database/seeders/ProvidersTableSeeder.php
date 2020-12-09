<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProvidersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \DB::table('providers')->insert(array(
            array(
              'name' => 'google',
              'image_type' => '.jpg',
              'description' => 'Must be in aspect ratio 4:3 < 2 mb size'
            ),
            array(
              'name' => 'google',
              'image_type' => '.mp4',
              'description' => '< 1 minutes long'
            ),
            array(
                'name' => 'google',
                'image_type' => '.mp3',
                'description' => '< 30 seconds long, < 5mb size'
            ),
            array(
                'name' => 'snapchat',
                'image_type' => '.jpg',
                'description' => 'Must be in aspect ratio 16:9, < 5mb in size'
            ),
            array(
                'name' => 'snapchat',
                'image_type' => '.gif',
                'description' => 'Must be in aspect ratio 16:9, < 5mb in size'
            ),
            array(
                'name' => 'snapchat',
                'image_type' => '.mp4',
                'description' => '< 50mb in size, < 5 minutes long'
            ),
            array(
                'name' => 'snapchat',
                'image_type' => '.mov',
                'description' => '< 50mb in size, < 5 minutes long'
            )
          ));
    }
}
