<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mau_sac extends Model
{
    use HasFactory;
    const     CREATED_AT    = 'mau_sac_tao_moi';
    const     UPDATED_AT    = 'mau_sac_cap_nhat';

    protected $table        = 'mau_sac';
    protected $fillable     = ['mau_sac_id','mau_sac_ma','mau_sac_ten','mau_sac_ten_vn','mau_sac_ten_en','mau_sac_tao_moi','mau_sac_cap_nhat'];
    protected $guarded      = ['mau_sac_id'];

    protected $primaryKey   = 'mau_sac_id';

    protected $dates        = ['mau_sac_tao_moi', 'mau_sac_cap_nhat'];
    protected $dateFormat   = 'Y-m-d H:i:s';
}
