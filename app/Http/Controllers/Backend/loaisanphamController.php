<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\loai_san_pham;

class loaisanphamController extends Controller
{
    public function index()
    {
        $ds_sp = \App\Models\loai_san_pham::all();
        return view('admin.loaisanpham.index')->with('data', $ds_sp);
    }
}
