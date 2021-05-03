<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class TokoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('roles')->delete();

        \DB::table('roles')->insert(array (
            0 =>
            array (
                'id' => 1,
                'user_id' => 4,
                'nama' => 'Toko Seller1',
                'deskrpsi' => 'ini toko seller1',
                'is_active' => 1
                'created_at' => '2021-04-30 06:37:19',
                'updated_at' => '2021-04-30 06:37:19',
            ),
            2 =>
            array (
                'id' => 2,
                'user_id' => 5,
                'nama' => 'Toko Seller2',
                'deskrpsi' => 'ini toko seller2',
                'is_active' => 0
                'created_at' => '2021-04-30 06:37:19',
                'updated_at' => '2021-04-30 06:37:19',
            ),
        ));
    }
}
