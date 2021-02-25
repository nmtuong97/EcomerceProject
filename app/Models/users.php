<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class users extends Model
{
    use HasFactory;
    const     CREATED_AT    = 'created_at';
    const     UPDATED_AT    = 'updated_at';

    protected $table        = 'users';
    protected $fillable     = ['id','name','email','email_verified_at','password','remember_token','created_at','updated_at','khach_hang_id','nhan_vien_id'];
    protected $guarded      = ['nhan_vien_id'];

    protected $primaryKey   = 'nhan_vien_id';

    protected $dates        = ['created_at', 'updated_at'];
    protected $dateFormat   = 'Y-m-d H:i:s';
    
}
