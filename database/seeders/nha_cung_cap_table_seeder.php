<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class nha_cung_cap_table_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = [
            'Apple',
            'Samsung',
            'Huawei',
            'Gucci',
            'Puma',
            'Adidas',
            'Sunhouse',
            'Bkav',
            'Vsmart',
            'Nikon',
        ];
        sort($types);
        $arr_obj = Array();
        foreach ($types as $k => $v) {
            $arr_obj[] = Array(
                'ncc_id' => $k + 1,
                'ncc_ma' => $k + 1,
                'ncc_ten' => stripUnicode($v),
                'ncc_ten_vn' => $v,
                'ncc_ten_en' => '',

            );
        }
        DB::table('nha_cung_cap')->insert($arr_obj);
    }
}
