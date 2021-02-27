<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mau_sac_san_pham extends Model
{
    use HasFactory;
    public    $timestamps   = false;

    protected $table        = 'mau_sac_san_pham';

    protected $guarded      = ['mau_sac_san_pham_id', 'mau_sac_id','san_pham_id'];

    protected $primaryKey   = ['mau_sac_san_pham_id', 'mau_sac_id','san_pham_id'];

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
