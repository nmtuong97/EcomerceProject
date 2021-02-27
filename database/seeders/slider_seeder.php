<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class slider_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $types = [
            Array('id'=> 1, 'name' => 'slide-01.jpg', 'header' => 'Women Collection 2018', 'content' => 'Men Collection 2018'),
            Array('id'=> 2, 'name' => 'slide-02.jpg', 'header' => 'Men New-Season', 'content' => 'Jackets & Coats'),
            Array('id'=> 3, 'name' => 'slide-03.jpg', 'header' => 'Men New-Season', 'content' => 'Jackets & Coats'),
        ];
        sort($types);
        $arr_obj = Array();
        foreach ($types as $k => $v) {
            $arr_obj[] = Array(
                'slider_id' => $v['id'],
                'slider_ten_hinh' => $v['name'],
                'slider_header' => $v['header'],
                'slider_content' => $v['content'],
            );
        }
        DB::table('slider')->insert($arr_obj);
    }
}
