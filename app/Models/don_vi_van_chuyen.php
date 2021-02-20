<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class don_vi_van_chuyen extends Model
{
    use HasFactory;
    const     CREATED_AT    = 'don_vi_van_chuyen_tao_moi';
    const     UPDATED_AT    = 'don_vi_van_chuyen_cap_nhat';

    protected $table        = 'don_vi_van_chuyen';
    protected $fillable     = ['don_vi_van_chuyen_id','don_vi_van_chuyen_ma','don_vi_van_chuyen_ten','don_vi_van_chuyen_ten_vn','don_vi_van_chuyen_ten_en', 'don_vi_van_chuyen_gia_goc', 'don_vi_van_chuyen_gia', 'don_vi_van_chuyen_tao_moi','don_vi_van_chuyen_cap_nhat'];
    protected $guarded      = ['don_vi_van_chuyen_id'];

    protected $primaryKey   = 'don_vi_van_chuyen_id';

    protected $dates        = ['don_vi_van_chuyen_tao_moi', 'don_vi_van_chuyen_cap_nhat'];
    protected $dateFormat   = 'Y-m-d H:i:s';
}
