<?php

use Illuminate\Database\Seeder;
// use DB;
class KhachHangSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Khai báo thư viện faker
        $faker = Faker\Factory::create();
        for($i = 0 ; $i < 10 ; $i++)
        {

            DB::table('khachhang')->insert(
                [
                    'username' => 'ngocduc'.$i,
                    'password' => Hash::make(123),
                    'kh_hoten' => $faker->name,
                    'kh_sdt' => $faker->phoneNumber,
                    'kh_diachi' => $faker->address
                ]
            );
        }
    }
}
