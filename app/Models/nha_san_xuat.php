<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class nha_san_xuat extends Model
{
    use HasFactory;
    const     CREATED_AT    = 'nsx_tao_moi';
    const     UPDATED_AT    = 'nsx_cap_nhat';

    protected $table        = 'nha_san_xuat';
    protected $fillable     = ['nsx_id','nsx_ma','nsx_ten','nsx_ten_vn','nsx_ten_en','nsx_tao_moi','nsx_cap_nhat'];
    protected $guarded      = ['nsx_id'];

    protected $primaryKey   = 'nsx_id';

    protected $dates        = ['nsx_tao_moi', 'nsx_cap_nhat'];
    protected $dateFormat   = 'Y-m-d H:i:s';
}
