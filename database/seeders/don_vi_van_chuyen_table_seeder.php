<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class don_vi_van_chuyen_table_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = [
            Array('ma' => 'GHTK', 'ten' => 'Giao hàng tiết kiệm', 'gia_goc' => 15000, 'gia' => 25000),
            Array('ma' => 'GHN', 'ten' => 'Giao hàng nhanh', 'gia_goc' => 20000, 'gia' => 30000),
            Array('ma' => 'VTP', 'ten' => 'Viettel Post', 'gia_goc' => 22000, 'gia' => 32000),
            Array('ma' => 'LEL', 'ten' => 'LEL Express', 'gia_goc' => 10000, 'gia' => 20000),
            Array('ma' => 'BEST', 'ten' => 'Best Express', 'gia_goc' => 15000, 'gia' => 20000),
        ];
        sort($types);
        $arr_obj = Array();
        foreach ($types as $k => $v) {
            $arr_obj[] = Array(
                'don_vi_van_chuyen_id' => $k + 1,
                'don_vi_van_chuyen_ma' => $v['ma'],
                'don_vi_van_chuyen_ten' => stripUnicode($v['ten']),
                'don_vi_van_chuyen_ten_vn' => $v['ten'],
                'don_vi_van_chuyen_ten_en' => '',
                'don_vi_van_chuyen_gia_goc' => $v['gia_goc'],
                'don_vi_van_chuyen_gia' => $v['gia'],

            );
        }
        DB::table('don_vi_van_chuyen')->insert($arr_obj);
    }
}
