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
                'remember_token' => 'yudyLFrsE7pI5tHb8H7wEE89m6KfryJdmmFQ9VsO22wZaLrXyKuOKGlTDQzh',
                'settings' => NULL,
                'current_team_id' => NULL,
                'profile_photo_path' => NULL,
                'created_at' => '2021-04-30 06:37:19',
                'updated_at' => '2021-04-30 06:37:19',
                'alamat' => NULL,
                'no_hp' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'role_id' => 3,
                'name' => 'userrrrrrrrrrr',
                'email' => 'user@mail.com',
                'avatar' => 'users/default.png',
                'email_verified_at' => NULL,
                'password' => '$2y$10$K1g3DBK3EMYDRWwSz7k6k.ZKYMbEjdmAj2JrhSr/QaDJHco8odFz.',
                'two_factor_secret' => NULL,
                'two_factor_recovery_codes' => NULL,
                'remember_token' => '0xRgtX5LnMdvJmchJsQ2JJ699Os9QmvsEhlR8PkutONnGjSr0uxVY1EcER9j',
                'settings' => '{"locale":"en"}',
                'current_team_id' => NULL,
                'profile_photo_path' => NULL,
                'created_at' => '2021-05-03 06:50:36',
                'updated_at' => '2021-05-09 16:01:27',
                'alamat' => 'rumahhhhhhhhhhh',
                'no_hp' => '123123123123123123',
            ),
            2 => 
            array (
                'id' => 3,
                'role_id' => 3,
                'name' => 'user2',
                'email' => 'user2@mail.com',
                'avatar' => 'users/default.png',
                'email_verified_at' => NULL,
                'password' => '$2y$10$op/Ry2DVSpCIBH7LAO2bneiU4U2Fq5M7ou0hOd1U7yHW4rSS1sz9a',
                'two_factor_secret' => NULL,
                'two_factor_recovery_codes' => NULL,
                'remember_token' => 'bKLsP9aYWphdw4Y6kY8b8PkZk9bmmkwwdfS0I5ijYhQhuRfOflNBKyOuyQy8',
                'settings' => NULL,
                'current_team_id' => NULL,
                'profile_photo_path' => NULL,
                'created_at' => '2021-05-03 07:03:16',
                'updated_at' => '2021-05-03 08:38:30',
                'alamat' => NULL,
                'no_hp' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'role_id' => 2,
                'name' => 'Pengguna',
                'email' => 'pengguna@mail.com',
                'avatar' => 'users/default.png',
                'email_verified_at' => NULL,
                'password' => '$2y$10$gTc.gCGXUCJOk84OiLUbtOPYW84Xd3WaSVCHh/rDj272q9APiM93u',
                'two_factor_secret' => NULL,
                'two_factor_recovery_codes' => NULL,
                'remember_token' => NULL,
                'settings' => NULL,
                'current_team_id' => NULL,
                'profile_photo_path' => NULL,
                'created_at' => '2021-05-04 07:12:48',
                'updated_at' => '2021-05-04 07:12:48',
                'alamat' => NULL,
                'no_hp' => NULL,
            ),
            4 => 
            array (
                'id' => 7,
                'role_id' => 2,
                'name' => 'luthfi',
                'email' => 'luthfi@mail.com',
                'avatar' => 'users/default.png',
                'email_verified_at' => NULL,
                'password' => '$2y$10$Bx3YmzFUEIA0WiUIVqndbOZtSS11bMHudtg0Axk4OgW/yBI95GmTu',
                'two_factor_secret' => NULL,
                'two_factor_recovery_codes' => NULL,
                'remember_token' => 'IL40a2Vh1Y1YW57J3mWSScQNaFt6SWbECts4QbXkyTYOayoxQKSlOvQRwjG0',
                'settings' => NULL,
                'current_team_id' => NULL,
                'profile_photo_path' => NULL,
                'created_at' => '2021-05-08 09:10:37',
                'updated_at' => '2021-05-08 09:10:37',
                'alamat' => 'indramayu',
                'no_hp' => '08123456',
            ),
            5 => 
            array (
                'id' => 8,
                'role_id' => 2,
                'name' => 'user',
                'email' => 'goldiansyah@gmail.com',
                'avatar' => 'users/default.png',
                'email_verified_at' => NULL,
                'password' => '$2y$10$ULh0X1rj7Jz2VhayjjXuRuZj9MV5ZX8VTv7mSl1rfzSSpQAFaJgNO',
                'two_factor_secret' => NULL,
                'two_factor_recovery_codes' => NULL,
                'remember_token' => NULL,
                'settings' => NULL,
                'current_team_id' => NULL,
                'profile_photo_path' => NULL,
                'created_at' => '2021-05-09 11:31:57',
                'updated_at' => '2021-05-09 11:31:57',
                'alamat' => 'rumah',
                'no_hp' => '123',
            ),
        ));
        
        
    }
}