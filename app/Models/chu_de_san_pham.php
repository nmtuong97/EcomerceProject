<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class chu_de_san_pham extends Model
{
    use HasFactory;
    public    $timestamps   = false;

    protected $table        = 'chu_de_san_pham';
//    protected $fillable     = ['san_pham_hinh_anh_ten'];
    protected $guarded      = ['chu_de_san_pham_id', 'chu_de_id','san_pham_id'];

    protected $primaryKey   = ['chu_de_san_pham_id', 'chu_de_id','san_pham_id'];

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
