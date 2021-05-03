<?php

use Illuminate\Database\Seeder;
use TCG\Voyager\Models\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Auto generated seed file.
     */
    public function run()
    {
        \DB::table('roles')->delete();

        \DB::table('roles')->insert(array (
            0 =>
            array (
                'id' => 1,
                'name' => 'admin',
                'display_name' => 'Administrator',
                'created_at' => '2020-02-11 00:10:11',
                'updated_at' => '2020-02-11 00:10:11',
            ),
            1 =>
            array (
                'id' => 2,
                'name' => 'user',
                'display_name' => 'Normal User',
                'created_at' => '2020-02-11 00:10:11',
                'updated_at' => '2020-02-11 00:10:11',
            ),
            2 =>
            array (
                'id' => 3,
                'name' => 'pedagang',
                'display_name' => 'Pedagang',
                'created_at' => '2020-02-19 17:25:16',
                'updated_at' => '2020-02-19 17:25:16',
            ),
        ));
    }
}
