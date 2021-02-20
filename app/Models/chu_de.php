<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class chu_de extends Model
{
    use HasFactory;
    const     CREATED_AT    = 'chu_de_tao_moi';
    const     UPDATED_AT    = 'chu_de_cap_nhat';

    protected $table        = 'chu_de';
    protected $fillable     = ['chu_de_id','chu_de_ma','chu_de_ten','chu_de_ten_vn','chu_de_ten_en','chu_de_tao_moi','chu_de_cap_nhat'];
    protected $guarded      = ['chu_de_id'];

    protected $primaryKey   = 'chu_de_id';

    protected $dates        = ['chu_de_tao_moi', 'chu_de_cap_nhat'];
    protected $dateFormat   = 'Y-m-d H:i:s';
}
