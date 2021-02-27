<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class slider extends Model
{
    use HasFactory;
    protected $table        = 'slider';
    protected $fillable     = ['slider_ten_hinh','slider_header','slider_content'];
    protected $guarded      = ['slider_id'];

    protected $primaryKey   = 'slider_id';
}
