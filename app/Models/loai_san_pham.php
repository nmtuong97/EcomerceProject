<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class loai_san_pham extends Model
{
    use HasFactory;
    const     CREATED_AT    = 'loai_san_pham_tao_moi';
    const     UPDATED_AT    = 'loai_san_pham_cap_nhat';

    protected $table        = 'loai_san_pham';
    protected $fillable     = ['loai_san_pham_id','loai_san_pham_ma','loai_san_pham_ten','loai_san_pham_ten_vn','loai_san_pham_ten_en','loai_san_pham_tao_moi','loai_san_pham_cap_nhat'];
    protected $guarded      = ['loai_san_pham_id'];

    protected $primaryKey   = 'loai_san_pham_id';

    protected $dates        = ['loai_san_pham_tao_moi', 'loai_san_pham_cap_nhat'];
    protected $dateFormat   = 'Y-m-d H:i:s';

//    public function sanPhams()
//    {
//        return $this->hasMany('App\SanPham', 'l_ma', 'l_ma');
//    }
}
