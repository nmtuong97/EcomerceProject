<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class mau_sac_table_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = [
            'Đen',
            'Xanh da trời',
            'Nâu',
            'Xám',
            'Xanh lá cây',
            'Cam',
            'Hồng',
            'Màu tím',
            'Đỏ',
            'Trắng',
            'Vàng',
            'Xanh nước biển',
        ];
        sort($types);
        $arr_obj = Array();
        foreach ($types as $k => $v) {
            $arr_obj[] = Array(
                'mau_sac_id' => $k + 1,
                'mau_sac_ma' => $k + 1,
                'mau_sac_ten' => stripUnicode($v),
                'mau_sac_ten_vn' => $v,
                'mau_sac_ten_en' => '',

            );
        }
        DB::table('mau_sac')->insert($arr_obj);
    }
}
