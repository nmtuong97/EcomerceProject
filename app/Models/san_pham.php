<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class san_pham extends Model
{
    use HasFactory;
    const     CREATED_AT    = 'san_pham_tao_moi';
    const     UPDATED_AT    = 'san_pham_cap_nhat';

    protected $table        = 'san_pham';
    protected $fillable     = ['san_pham_id','san_pham_ma','san_pham_ten','san_pham_ten_vn','san_pham_ten_en','san_pham_gia_goc','san_pham_gia_ban','san_pham_hinh_anh','san_pham_mo_ta','san_pham_trang_thai','san_pham_tao_moi','san_pham_cap_nhat','loai_san_pham_id'];
    protected $guarded      = ['san_pham_id'];

    protected $primaryKey   = 'san_pham_id';

    protected $dates        = ['san_pham_tao_moi', 'san_pham_cap_nhat'];
    protected $dateFormat   = 'Y-m-d H:i:s';
    
    public function loai_san_pham()
    {
        return $this->belongsTo('App\Models\loai_san_pham', 'loai_san_pham_id', 'loai_san_pham_id');
    }
    
    public function san_pham_hinh_anh()
    {
        return $this->hasMany('App\Models\san_pham_hinh_anh', 'san_pham_id', 'san_pham_id');
    }
}
