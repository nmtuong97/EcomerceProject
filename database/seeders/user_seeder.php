<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class user_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arr_obj = [ 0 => [
                'nhan_vien_id' => 1,
                'nhan_vien_ma' => 'NV001',
                'nhan_vien_ho_lot' => 'Nguyen',
                'nhan_vien_ten' => 'Manh Tuong',
                'nhan_vien_ho_lot_vn' => 'Nguyễn',
                'nhan_vien_ten_vn' => 'Mạnh Tường',
                'nhan_vien_username' => 'nhanvien@gmail.com',
                'nhan_vien_mat_khau' => bcrypt('123456'),
                'nhan_vien_gioi_tinh' => 1,
                'nhan_vien_dia_chi' => 'Bạc Liêu',
                'nhan_vien_sdt' => '0845527711',
                'nhan_vien_email' => 'nhanvien@gmail.com',
                'nhan_vien_admin' => '0',
                'nhan_vien_hinh_anh' => 'hinhanhnhanvien.jpg',
        ]];
        DB::table('nhan_vien')->insert($arr_obj);
        
        $arr_user = [
            0 => [
                'id' => '1',
                'name' => 'Nguyễn Mạnh Tường',
                'email' => 'nhanvien@gmail.com',
                'password' =>  bcrypt('123456'),
                'nhan_vien_id' => '1',

            ]
        ];
        DB::table('users')->insert($arr_user);
        
        $arr_khach_hang = [
            0 => [
                'khach_hang_id' => '1',
                'khach_hang_ho_lot' => 'Bien',
                'khach_hang_ho_lot_vn' => 'Biện',
                'khach_hang_ten' => 'Cong Nhut Truong',
                'khach_hang_ten_vn' => 'Công Nhựt Trường',
                'khach_hang_gioi_tinh' => '1',
                'khach_hang_ngay_sinh' => '1/1/1993',
                'khach_hang_sdt' => '01256622456',
                'khach_hang_email' => 'khachhang@gmail.com',
                'khach_hang_dia_chi' => 'Cần Thơ',
                'khach_hang_username' => 'khachhang@gmail.com',
                'khach_hang_password' => bcrypt('123456'),
                'khach_hang_remember_token' => bcrypt('123456'),
            ]
        ];
        DB::table('khach_hang')->insert($arr_khach_hang);
        
        $arr_user_kh = [
            0 => [
                'id' => '2',
                'name' => 'Biện Công Nhựt Trường',
                'email' => 'khachhang@gmail.com',
                'password' =>  bcrypt('123456'),
                'khach_hang_id' => '1',

            ]
        ];
        DB::table('users')->insert($arr_user_kh);
        
    }
}
