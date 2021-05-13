<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('categories')->delete();
        
        \DB::table('categories')->insert(array (
            0 => 
            array (
                'id' => 3,
                'parent_id' => NULL,
                'order' => 1,
                'name' => 'Sayur',
                'slug' => 'sayur',
                'created_at' => '2021-05-04 11:58:40',
                'updated_at' => '2021-05-04 11:59:09',
            ),
            1 => 
            array (
                'id' => 4,
                'parent_id' => NULL,
                'order' => 1,
                'name' => 'Ayam',
                'slug' => 'ayam',
                'created_at' => '2021-05-04 11:59:22',
                'updated_at' => '2021-05-04 11:59:22',
            ),
            2 => 
            array (
                'id' => 5,
                'parent_id' => NULL,
                'order' => 1,
                'name' => 'Sapi',
                'slug' => 'sapi',
                'created_at' => '2021-05-04 11:59:37',
                'updated_at' => '2021-05-04 11:59:37',
            ),
            3 => 
            array (
                'id' => 6,
                'parent_id' => NULL,
                'order' => 1,
                'name' => 'Ikan',
                'slug' => 'ikan',
                'created_at' => '2021-05-04 11:59:44',
                'updated_at' => '2021-05-04 11:59:44',
            ),
            4 => 
            array (
                'id' => 7,
                'parent_id' => 6,
                'order' => 1,
                'name' => 'Ikan Tawar',
                'slug' => 'ikan-tawar',
                'created_at' => '2021-05-04 12:12:25',
                'updated_at' => '2021-05-04 12:12:25',
            ),
            5 => 
            array (
                'id' => 8,
                'parent_id' => 6,
                'order' => 1,
                'name' => 'Ikan Laut',
                'slug' => 'ikan-laut',
                'created_at' => '2021-05-04 12:12:40',
                'updated_at' => '2021-05-04 12:12:40',
            ),
            6 => 
            array (
                'id' => 9,
                'parent_id' => 3,
                'order' => 1,
                'name' => 'Daun',
                'slug' => 'daun',
                'created_at' => '2021-05-04 12:15:18',
                'updated_at' => '2021-05-04 12:15:18',
            ),
            7 => 
            array (
                'id' => 10,
                'parent_id' => 3,
                'order' => 1,
                'name' => 'Jamur',
                'slug' => 'jamur',
                'created_at' => '2021-05-04 12:15:25',
                'updated_at' => '2021-05-04 12:15:25',
            ),
            8 => 
            array (
                'id' => 11,
                'parent_id' => NULL,
                'order' => 1,
                'name' => 'Buah',
                'slug' => 'buah',
                'created_at' => '2021-05-04 12:15:30',
                'updated_at' => '2021-05-04 12:15:30',
            ),
            9 => 
            array (
                'id' => 12,
                'parent_id' => 7,
                'order' => 1,
                'name' => 'Lele',
                'slug' => 'lele',
                'created_at' => '2021-05-04 15:30:09',
                'updated_at' => '2021-05-04 15:30:09',
            ),
            10 => 
            array (
                'id' => 13,
                'parent_id' => 8,
                'order' => 1,
                'name' => 'Kepiting',
                'slug' => 'kepiting',
                'created_at' => '2021-05-04 15:30:29',
                'updated_at' => '2021-05-04 15:30:29',
            ),
            11 => 
            array (
                'id' => 14,
                'parent_id' => 9,
                'order' => 1,
                'name' => 'Kangkung',
                'slug' => 'kangkung',
                'created_at' => '2021-05-04 15:31:05',
                'updated_at' => '2021-05-04 15:31:05',
            ),
            12 => 
            array (
                'id' => 15,
                'parent_id' => 10,
                'order' => 1,
                'name' => 'Jamur Tiram',
                'slug' => 'jamur-tiram',
                'created_at' => '2021-05-04 15:31:21',
                'updated_at' => '2021-05-04 15:31:21',
            ),
            13 => 
            array (
                'id' => 16,
                'parent_id' => NULL,
                'order' => 1,
                'name' => 'Sembako',
                'slug' => 'sembako',
                'created_at' => '2021-05-06 13:34:57',
                'updated_at' => '2021-05-06 13:34:57',
            ),
        ));
        
        
    }
}