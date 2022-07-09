<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=0;$i<10;$i++){
            DB::table('image_info')->insert([
                'name' => Str::random(5),
                'p_image' => "1657073647_download.png",
                'phone' =>"0174386277".$i
                
            ]);
        }
    }
}
