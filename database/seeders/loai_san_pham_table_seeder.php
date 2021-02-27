<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class loai_san_pham_table_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = [
            'Giày dép',
            'Quần áo',
            'Túi xách',
            'Vest',
            'Điện thoại',
            'Phụ kiện',
            'Máy tính bảng',
            'Tai nghe',
            'Đồng hồ',
            'Điện gia dụng',
            'Thể thao',
        ];
        sort($types);
        $arr_obj = Array();
        foreach ($types as $k => $v) {
            $arr_obj[] = Array(
                'loai_san_pham_id' => $k + 1,
                'loai_san_pham_ma' => $k + 1,
                'loai_san_pham_ten' => stripUnicode($v),
                'loai_san_pham_ten_vn' => $v,
                'loai_san_pham_ten_en' => '',

            );
        }
        DB::table('loai_san_pham')->insert($arr_obj);
    }
}
