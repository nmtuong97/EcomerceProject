<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class nha_cung_cap extends Model
{
    use HasFactory;
    const     CREATED_AT    = 'ncc_tao_moi';
    const     UPDATED_AT    = 'ncc_cap_nhat';

    protected $table        = 'nha_cung_cap';
    protected $fillable     = ['ncc_id','ncc_ma','ncc_ten','ncc_ten_vn','ncc_ten_en','ncc_tao_moi','ncc_cap_nhat'];
    protected $guarded      = ['ncc_id'];

    protected $primaryKey   = 'ncc_id';

    protected $dates        = ['ncc_tao_moi', 'ncc_cap_nhat'];
    protected $dateFormat   = 'Y-m-d H:i:s';
}
