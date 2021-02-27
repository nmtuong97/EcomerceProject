<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class chu_de_table_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = [
            'Sản phẩm bán chạy',
            'Khuyến mãi khủng',
            'Rẻ vô địch',
            'Free ship',
            'Free ship Extra',
            'Mua nhiều giảm nhiều',
            'Sale upto 40%',
            'Sale upto 50%',
            'Sale upto 60%',
            'Sale upto 70%',
        ];
        sort($types);
        $arr_obj = Array();
        foreach ($types as $k => $v) {
            $arr_obj[] = Array(
                'chu_de_id' => $k + 1,
                'chu_de_ma' => $k + 1,
                'chu_de_ten' => stripUnicode($v),
                'chu_de_ten_vn' => $v,
                'chu_de_ten_en' => '',

            );
        }
        DB::table('chu_de')->insert($arr_obj);
    }
}
