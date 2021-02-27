<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\slider;
use App\Models\loai_san_pham;
use App\Models\san_pham;
use Illuminate\Support\Facades\DB;
use Response;
use App\Http\Requests\LogInRequest;
use Session;
class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
//        print_r($request);
//        print_r($_POST);
//        print_r($_GET);
        $slider = slider::all();
        $loaisp = loai_san_pham::all();
        
        $dssanpham = DB::select('
            SELECT san_pham_id,
            san_pham_ma,
            san_pham_ten,
            san_pham_ten_vn,
            san_pham_ten_en,
            san_pham_gia_goc,
            san_pham_gia_ban,
            san_pham_hinh_anh,
            san_pham_mo_ta,
            san_pham_trang_thai,
            san_pham_tao_moi,
            san_pham_cap_nhat,
            a.loai_san_pham_id,
            loai_san_pham_ma,
            loai_san_pham_ten_vn,
            loai_san_pham_ten_en

            FROM san_pham a
            LEFT JOIN loai_san_pham b ON a.loai_san_pham_id = b.loai_san_pham_id

            ORDER BY san_pham_id DESC

            limit 0,49
        ');
        
        return view('khachhang.index')
        ->with('danhsach', $slider)
        ->with('dssanpham', $dssanpham)
        ->with('loaisp', $loaisp);
    }
    
    public function info(Request $request)
    {        
        $masp = $request->masp;
//        print_r($masp);die;
//        $sp = san_pham::where("san_pham_ma", $masp)->first(); 
        $sp = DB::select('
            SELECT san_pham_id,
            san_pham_ma,
            san_pham_ten,
            san_pham_ten_vn,
            san_pham_ten_en,
            san_pham_gia_goc,
            san_pham_gia_ban,
            san_pham_hinh_anh,
            san_pham_mo_ta,
            san_pham_trang_thai,
            san_pham_tao_moi,
            san_pham_cap_nhat,
            a.loai_san_pham_id,
            loai_san_pham_ma,
            loai_san_pham_ten_vn,
            loai_san_pham_ten_en

            FROM san_pham a
            LEFT JOIN loai_san_pham b ON a.loai_san_pham_id = b.loai_san_pham_id
            WHERE san_pham_ma = :masp
            
        ',['masp' => $masp]);
        
        $hinhsp = DB::select("
            SELECT san_pham_hinh_anh hinhanh
            FROM san_pham
            WHERE san_pham_ma = :masp1

            UNION 

            SELECT san_pham_hinh_anh_ten hinhanh
            FROM san_pham a
            LEFT JOIN san_pham_hinh_anh b on a.san_pham_id = b.san_pham_id
            WHERE san_pham_ma = :masp2
            and san_pham_hinh_anh_ten is not null
            LIMIT 0,6
            
        ",['masp1' => $masp,'masp2' => $masp]);
        
        $kichthuoc = DB::select("
            SELECT c.kich_thuoc_id num,kich_thuoc_ma ma,kich_thuoc_ten_vn ten
            from san_pham a
            LEFT JOIN kich_thuoc_san_pham b on a.san_pham_id = b.san_pham_id
            LEFT JOIN kich_thuoc c on b.kich_thuoc_id = c.kich_thuoc_id

            WHERE san_pham_ma = :masp
            and c.kich_thuoc_ma is not null
            
        ",['masp' => $masp]);
        $mausac = DB::select("
             SELECT c.mau_sac_id num,mau_sac_ma ma,mau_sac_ten_vn ten
            from san_pham a
            LEFT JOIN mau_sac_san_pham b on a.san_pham_id = b.san_pham_id
            LEFT JOIN mau_sac c on b.mau_sac_id = c.mau_sac_id

            WHERE san_pham_ma = :masp
            and c.mau_sac_ma is not null
            
        ",['masp' => $masp]);
        return Response::json(Array('sp' => $sp, 'hinh' =>$hinhsp,'kichthuoc' => $kichthuoc,'mausac' => $mausac));
        
    }
    
    public function login(LogInRequest $request)
    {
//        dd(bcrypt('123456'));
        $username = $request->username;
        $data = DB::select("
            SELECT a.khach_hang_id,
            b.khach_hang_email,
            concat(b.khach_hang_ho_lot_vn,' ', b.khach_hang_ten_vn) hoten,
            case WHEN b.khach_hang_gioi_tinh = '1' then 'Nam'
            WHEN b.khach_hang_gioi_tinh = '2' then 'Nữ'
            ELSE 'Khác' end gioitinh,
            b.khach_hang_ngay_sinh,
            b.khach_hang_sdt,
            b.khach_hang_dia_chi
            from users a
            left join khach_hang b on a.khach_hang_id = b.khach_hang_id
            WHERE a.email = :username
            
        ",['username' => $username]);
        $info = Array();
        foreach($data as $k => $v) {
            $info['email'] = $v->khach_hang_email;
            $info['hoten'] = $v->hoten;
            $info['gioitinh'] = $v->gioitinh;
            $info['ngaysinh'] = $v->khach_hang_ngay_sinh;
            $info['sdt'] = $v->khach_hang_sdt;
            $info['diachi'] = $v->khach_hang_dia_chi;
            
        }
        Session::forget('khachhanginfo');
        Session::put('khachhanginfo', $info);
        return redirect(route('home.index'));
    }
    
    public function logoff()
    {
        Session::forget('khachhanginfo');
        return redirect(route('home.index'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
