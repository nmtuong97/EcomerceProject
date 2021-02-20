<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class nhan_vien extends Model
{
    use HasFactory;
    const     CREATED_AT    = 'nhan_vien_tao_moi';
    const     UPDATED_AT    = 'nhan_vien_cap_nhat';

    protected $table        = 'nhan_vien';
    protected $fillable     = ['nhan_vien_id','nhan_vien_ma','nhan_vien_ho_lot','nhan_vien_ten','nhan_vien_ho_lot_vn','nhan_vien_ten_vn','nhan_vien_username','nhan_vien_mat_khau','nhan_vien_gioi_tinh','nhan_vien_dia_chi','nhan_vien_sdt','nhan_vien_email','nhan_vien_admin','nhan_vien_hinh_anh','nhan_vien_tao_moi','nhan_vien_cap_nhat'];
    protected $guarded      = ['nhan_vien_id'];

    protected $primaryKey   = 'nhan_vien_id';

    protected $dates        = ['nhan_vien_tao_moi', 'nhan_vien_cap_nhat'];
    protected $dateFormat   = 'Y-m-d H:i:s';
}
