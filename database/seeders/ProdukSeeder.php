<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class ProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
 
    	for($i = 1; $i <= 50; $i++){
 
    	      // insert data ke table pegawai menggunakan Faker
    		DB::table('produks')->insert([
    			'nama' => $faker->sentence(2),
    			'deskripsi' => $faker->sentence(20),
    			'jumlah' => $faker->numberBetween(25,40),
    			'harga' => $faker->numberBetween(1000,5000)
    		]);
 
    	}
    }
}
