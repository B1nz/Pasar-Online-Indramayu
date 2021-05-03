<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use phpDocumentor\Reflection\Types\Null_;
use TCG\Voyager\Models\Role;
use TCG\Voyager\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Auto generated seed file.
     *
     * @return void
     */
    public function run()
    {

        \DB::table('users')->delete();

        \DB::table('users')->insert(array (
            0 =>
            array (
                'id' => 1,
                'role_id' => 1,
                'name' => 'Admin',
                'email' => 'admin@pasarindramayu.com',
                'avatar' => 'users/default.png',
                'email_verified_at' => '2020-02-09 12:42:53',
                'password' => bcrypt('password'),
                'remember_token' => Str::random(60),
                'settings' => NULL,
                'created_at' => '2020-02-09 12:42:53',
                'updated_at' => '2020-02-11 00:15:23',
            ),
            1 =>
            array (
                'id' => 2,
                'role_id' => 2,
                'name' => 'User1',
                'email' => 'user1@pasarindramayu.com',
                'avatar' => 'users/default.png',
                'email_verified_at' => NULL,
                'password' => bcrypt('password'),
                'remember_token' => NULL,
                'settings' => NULL,
                'created_at' => '2020-02-09 12:42:53',
                'updated_at' => '2020-02-11 00:15:23',
            ),
            2 =>
            array (
                'id' => 3,
                'role_id' => 2,
                'name' => 'User2',
                'email' => 'user2@pasarindramayu.com',
                'avatar' => 'users/default.png',
                'email_verified_at' => NULL,
                'password' => bcrypt('password'),
                'remember_token' => NULL,
                'settings' => NULL,
                'created_at' => '2020-02-09 12:42:53',
                'updated_at' => '2020-02-11 00:15:23',
            ),
            4 =>
            array (
                'id' => 4,
                'role_id' => 3,
                'name' => 'Seller1',
                'email' => 'seller@pasarindramayu.com',
                'avatar' => 'users/default.png',
                'email_verified_at' => NULL,
                'password' => bcrypt('password'),
                'remember_token' => NULL,
                'settings' => NULL,
                'created_at' => '2020-02-09 12:42:53',
                'updated_at' => '2020-02-11 00:15:23',
            ),
            5 =>
            array (
                'id' => 5,
                'role_id' => 3,
                'name' => 'Seller2',
                'email' => 'seller2@pasarindramayu.com',
                'avatar' => 'users/default.png',
                'email_verified_at' => NULL,
                'password' => bcrypt('password'),
                'remember_token' => NULL,
                'settings' => NULL,
                'created_at' => '2020-02-09 12:42:53',
                'updated_at' => '2020-02-11 00:15:23',
            ),
        ));
    }
}
