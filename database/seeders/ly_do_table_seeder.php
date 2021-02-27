<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ly_do_table_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = [
            Array('ma' => '1', 'ten' => 'Xuất kho', 'loai' => 1),
            Array('ma' => '2', 'ten' => 'Nhập kho', 'loai' => 2),
        ];
        sort($types);
        $arr_obj = Array();
        foreach ($types as $k => $v) {
            $arr_obj[] = Array(
                'ly_do_id' => $k + 1,
                'ly_do_ma' => $v['ma'],
                'ly_do_ten' => stripUnicode($v['ten']),
                'ly_do_ten_vn' => $v['ten'],
                'ly_do_ten_en' => '',
                'ly_do_loai' => $v['loai'],
            );
        }
        DB::table('ly_do')->insert($arr_obj);
    }
}
