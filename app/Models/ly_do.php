<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ly_do extends Model
{
    use HasFactory;
    const     CREATED_AT    = 'ly_do_tao_moi';
    const     UPDATED_AT    = 'ly_do_cap_nhat';

    protected $table        = 'ly_do';
    protected $fillable     = ['ly_do_id','ly_do_ma','ly_do_ten','ly_do_ten_vn','ly_do_ten_en', 'ly_do_loai','ly_do_tao_moi','ly_do_cap_nhat'];
    protected $guarded      = ['ly_do_id'];

    protected $primaryKey   = 'ly_do_id';

    protected $dates        = ['ly_do_tao_moi', 'ly_do_cap_nhat'];
    protected $dateFormat   = 'Y-m-d H:i:s';
}
