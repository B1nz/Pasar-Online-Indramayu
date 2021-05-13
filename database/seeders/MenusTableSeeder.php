<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class MenusTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('menus')->delete();
        
        \DB::table('menus')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'admin',
                'created_at' => '2021-04-30 06:37:19',
                'updated_at' => '2021-04-30 06:37:19',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'pedagang',
                'created_at' => '2021-05-06 16:50:38',
                'updated_at' => '2021-05-07 03:34:42',
            ),
        ));
        
        
    }
}