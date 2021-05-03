<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
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
                'email' => 'admin@admin.com',
                'avatar' => 'users/default.png',
                'email_verified_at' => NULL,
                'password' => '$2y$10$71n48aPgQ.Z52cySS8jjCuVTG.GSz9c5fdwjnv6gpucuIT7IpjcaS',
                'two_factor_secret' => NULL,
                'two_factor_recovery_codes' => NULL,
                'remember_token' => 'VugmwLPQONhpCKRenjcOXJ4RKDkPnGSvFGsGO95p5Ylg435up1Ubsw9qjusQ',
                'settings' => NULL,
                'current_team_id' => NULL,
                'profile_photo_path' => NULL,
                'created_at' => '2021-04-30 06:37:19',
                'updated_at' => '2021-04-30 06:37:19',
            ),
            1 => 
            array (
                'id' => 2,
                'role_id' => 3,
                'name' => 'user',
                'email' => 'user@mail.com',
                'avatar' => 'users/default.png',
                'email_verified_at' => NULL,
                'password' => '$2y$10$H35CmfHos46NiO9yv5q1D./xpGSEAa4PaoZPpA0AiOwSn5wstg/Ka',
                'two_factor_secret' => NULL,
                'two_factor_recovery_codes' => NULL,
                'remember_token' => NULL,
                'settings' => '{"locale":"en"}',
                'current_team_id' => NULL,
                'profile_photo_path' => NULL,
                'created_at' => '2021-05-03 06:50:36',
                'updated_at' => '2021-05-03 07:04:44',
            ),
            2 => 
            array (
                'id' => 3,
                'role_id' => 2,
                'name' => 'user2',
                'email' => 'user2@mail.com',
                'avatar' => 'users/default.png',
                'email_verified_at' => NULL,
                'password' => '$2y$10$op/Ry2DVSpCIBH7LAO2bneiU4U2Fq5M7ou0hOd1U7yHW4rSS1sz9a',
                'two_factor_secret' => NULL,
                'two_factor_recovery_codes' => NULL,
                'remember_token' => 'Zwf7sZhIeIlycWJDfVtnP6jOiy6tF7KmCnKs8dpU4SKLAXr19XveNGumNhHh',
                'settings' => NULL,
                'current_team_id' => NULL,
                'profile_photo_path' => NULL,
                'created_at' => '2021-05-03 07:03:16',
                'updated_at' => '2021-05-03 07:03:16',
            ),
        ));
        
        
    }
}