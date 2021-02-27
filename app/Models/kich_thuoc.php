<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kich_thuoc extends Model
{
    use HasFactory;
    const     CREATED_AT    = 'kich_thuoc_tao_moi';
    const     UPDATED_AT    = 'kich_thuoc_cap_nhat';

    protected $table        = 'kich_thuoc';
    protected $fillable     = ['kich_thuoc_id','kich_thuoc_ma','kich_thuoc_ten','kich_thuoc_ten_vn','kich_thuoc_ten_en', 'kich_thuoc_dien_giai','kich_thuoc_tao_moi','kich_thuoc_cap_nhat'];
    protected $guarded      = ['kich_thuoc_id'];

    protected $primaryKey   = 'kich_thuoc_id';

    protected $dates        = ['kich_thuoc_tao_moi', 'kich_thuoc_cap_nhat'];
    protected $dateFormat   = 'Y-m-d H:i:s';
}
