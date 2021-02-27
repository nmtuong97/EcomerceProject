<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            slider_seeder::class,
            loai_san_pham_table_seeder::class,
            chu_de_table_seeder::class,
            nha_san_xuat_table_seeder::class,
            mau_sac_table_seeder::class,
            kich_thuoc_table_seeder::class,
            nha_cung_cap_table_seeder::class,
            don_vi_van_chuyen_table_seeder::class,
            ly_do_table_seeder::class,
            san_pham_table_seeder::class,
            user_seeder::class,
        ]);
    }
}
