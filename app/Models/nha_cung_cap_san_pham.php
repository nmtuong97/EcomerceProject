<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class nha_cung_cap_san_pham extends Model
{
    use HasFactory;
    public    $timestamps   = false;

    protected $table        = 'nha_cung_cap_san_pham';
//    protected $fillable     = ['san_pham_hinh_anh_ten'];
    protected $guarded      = ['nha_cung_cap_san_pham_id', 'ncc_id','san_pham_id'];

    protected $primaryKey   = ['nha_cung_cap_san_pham_id', 'ncc_id','san_pham_id'];

    public    $incrementing = false;
    
    
    protected function getKeyForSaveQuery($keyName = null)
    {
        if(is_null($keyName)){
            $keyName = $this->getKeyName();
        }

        if (isset($this->original[$keyName])) {
            return $this->original[$keyName];
        }

        return $this->getAttribute($keyName);
    }
}
