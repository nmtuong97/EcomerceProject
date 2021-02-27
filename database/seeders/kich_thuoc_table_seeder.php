<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class kich_thuoc_table_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = [
            'Size S',
            'Size M',
            'Size L',
            'Size XL',
            'Size XXL',
            'Size 28',
            'Size 29',
            'Size 30',
            'Size 31',
            'Size 32',
            'Size 33',
            'Size 34', 
        ];
        sort($types);
        $arr_obj = Array();
        foreach ($types as $k => $v) {
            $arr_obj[] = Array(
                'kich_thuoc_id' => $k + 1,
                'kich_thuoc_ma' => $k + 1,
                'kich_thuoc_ten' => stripUnicode($v),
                'kich_thuoc_ten_vn' => $v,
                'kich_thuoc_ten_en' => '',

            );
        }
        DB::table('kich_thuoc')->insert($arr_obj);
    }
}
