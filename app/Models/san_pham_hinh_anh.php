<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class san_pham_hinh_anh extends Model
{
    use HasFactory;
    public    $timestamps   = false;

    protected $table        = 'san_pham_hinh_anh';
    protected $fillable     = ['san_pham_hinh_anh_ten'];
    protected $guarded      = ['san_pham_hinh_anh_id', 'san_pham_id'];

    protected $primaryKey   = ['san_pham_hinh_anh_id', 'san_pham_id'];

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
