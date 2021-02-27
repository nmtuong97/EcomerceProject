<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class san_pham_table_seeder extends Seeder
{
    public function run()
    {
        $types = [
            Array('id'=> 1, 'ma' => 'SP001', 'ten' => 'Áo khoác thời trang', 'gia_goc' => 100000, 'gia' => 250000, 'hinh_anh' => 'sp_avata_SP001.jpg', 'trang_thai' => 1, 'loai' => 4),
            Array('id'=> 2,'ma' => 'SP002', 'ten' => 'Vest thời trang', 'gia_goc' => 250000, 'gia' => 500000, 'hinh_anh' => 'sp_avata_SP002.jpg', 'trang_thai' => 1, 'loai' => 8),
            Array('id'=> 3,'ma' => 'SP003', 'ten' => 'Đồng hồ thời trang', 'gia_goc' => 1500000, 'gia' => 3000000, 'hinh_anh' => 'sp_avata_SP003.jpg', 'trang_thai' => 1, 'loai' => 11),
            Array('id'=> 4,'ma' => 'SP004', 'ten' => 'Giày ADIDAS', 'gia_goc' => 500000, 'gia' => 1500000, 'hinh_anh' => 'sp_avata_SP004.jpg', 'trang_thai' => 1, 'loai' => 1),
            Array('id'=> 5,'ma' => 'SP005', 'ten' => 'Túi Xách GUCCI', 'gia_goc' => 5000000, 'gia' => 15000000, 'hinh_anh' => 'sp_avata_SP005.jpg', 'trang_thai' => 1, 'loai' => 7),
        ];
        sort($types);
        $arr_obj = Array();
        foreach ($types as $k => $v) {
            $arr_obj[] = Array(
                'san_pham_id' => $v['id'],
                'san_pham_ma' => $v['ma'],
                'san_pham_ten' => stripUnicode($v['ten']),
                'san_pham_ten_vn' => $v['ten'],
                'san_pham_ten_en' => '',
                'san_pham_gia_goc' => $v['gia_goc'],
                'san_pham_gia_ban' => $v['gia'],
                'san_pham_hinh_anh' => $v['hinh_anh'],
                'san_pham_trang_thai' => $v['trang_thai'],
                'loai_san_pham_id' => $v['loai'],
            );
        }
        DB::table('san_pham')->insert($arr_obj);
        
        $arr_hinh_anh_sp = Array(
              1 => Array(
                    'sp_hinhanhlienquan_SP001_0.jpg',
                    'sp_hinhanhlienquan_SP001_1.jpg',
                    'sp_hinhanhlienquan_SP001_2.jpg',
                    'sp_hinhanhlienquan_SP001_3.jpg',
              ),
              2 => Array(
                    'sp_hinhanhlienquan_SP002_0.jpg',
                    'sp_hinhanhlienquan_SP002_1.jpg',
                    'sp_hinhanhlienquan_SP002_2.jpg',
                    'sp_hinhanhlienquan_SP002_3.jpg',
                    'sp_hinhanhlienquan_SP002_4.jpg',
              ),
              3 => Array(
                    'sp_hinhanhlienquan_SP003_0.jpg',
                    'sp_hinhanhlienquan_SP003_1.jpg',
                    'sp_hinhanhlienquan_SP003_2.jpg',
                    'sp_hinhanhlienquan_SP003_3.jpg',
              ),
              4 => Array(
                    'sp_hinhanhlienquan_SP004_0.jpg',
                    'sp_hinhanhlienquan_SP004_1.jpg',
                    'sp_hinhanhlienquan_SP004_2.jpg',
                    'sp_hinhanhlienquan_SP004_3.jpg',
              ),
              5 => Array(
                    'sp_hinhanhlienquan_SP005_0.jpg',
                    'sp_hinhanhlienquan_SP005_1.jpg',
                    'sp_hinhanhlienquan_SP005_2.jpg',
                    'sp_hinhanhlienquan_SP005_3.jpg',
              )
        );
        $arr_obj_ha = Array();
        $id = 1;
        foreach ($arr_hinh_anh_sp as $id_sp => $value) {
            foreach ($value as $key2 => $ten_hinh) {
                $arr_obj_ha[] = Array(
                    'san_pham_hinh_anh_id' => $id,
                    'san_pham_id' => $id_sp,
                    'san_pham_hinh_anh_ten' => $ten_hinh
                );
                $id++;
            }
        }
        DB::table('san_pham_hinh_anh')->insert($arr_obj_ha);
        
        $arr_mssp = Array(
            1 => [1,2,3,5,6],
            2 => [2,4,6,8,9],
            3 => [1,2,3,7,9],
            4 => [2,4,5,6,8],
            5 => [2,4,6,8,10],
        );
        $arr_ob_mssp = Array();
        foreach ($arr_mssp as $id_sp => $value) {
            foreach ($value as $k => $mau_sac_id) {
                $arr_ob_mssp[] = Array(
                    'mau_sac_id' => $mau_sac_id,
                    'san_pham_id' => $id_sp,
                );
            }
        }
        DB::table('mau_sac_san_pham')->insert($arr_ob_mssp);
        
        $arr_ktsp = Array(
            1 => [1,2,3,4,5],
            2 => [3,6,7,4,5],
            3 => [5,4,3,2,8],
            4 => [2,4,6,7,9],
            5 => [3,6,8,5,7],
        );
        $arr_ob_ktsp = Array();
        foreach ($arr_ktsp as $id_sp => $value) {
            foreach ($value as $k => $kich_thuoc_id) {
                $arr_ob_ktsp[] = Array(
                    'kich_thuoc_id' => $kich_thuoc_id,
                    'san_pham_id' => $id_sp,
                );
            }
        }
         DB::table('kich_thuoc_san_pham')->insert($arr_ob_ktsp);
         
         
        
    }
}
