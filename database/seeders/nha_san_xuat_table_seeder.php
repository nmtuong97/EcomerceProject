<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class nha_san_xuat_table_seeder extends Seeder
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
                'nsx_id' => $k + 1,
                'nsx_ma' => $k + 1,
                'nsx_ten' => stripUnicode($v),
                'nsx_ten_vn' => $v,
                'nsx_ten_en' => '',

            );
        }
        DB::table('nha_san_xuat')->insert($arr_obj);
    }
}
