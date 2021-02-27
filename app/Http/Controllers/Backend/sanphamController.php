<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\san_pham;
use App\Models\san_pham_hinh_anh;
use App\Models\users;
use Session;
use App\Http\Requests\san_pham_create_request;
use App\Http\Requests\san_pham_update_request;
use Storage;
use Illuminate\Support\Facades\DB;

class sanphamController extends Controller
{
    public function index()
    {
        $ds_sp = \App\Models\san_pham::all();
        $ds_ncc = \App\Models\nha_cung_cap::all();
        return view('admin.sanpham.index')->with('data', $ds_sp)
                                            ->with('ncc', $ds_ncc);
    }
    public function create()
    {
        $ds_lsp = \App\Models\loai_san_pham::all();
        return view('admin.sanpham.create')->with('data', $ds_lsp);
    }
    public function edit($id)
    {
        $san_pham = san_pham::find($id);
        
        $ds_lsp = \App\Models\loai_san_pham::all();
        return view('admin.sanpham.edit')->with('data', $ds_lsp)
                                         ->with('san_pham', $san_pham);
    }
    public function editfunction($id)
    {
        $san_pham = san_pham::find($id);
        
        $ds_lsp = \App\Models\loai_san_pham::all();
        $ds_ncc = \App\Models\nha_cung_cap::all();
        $ds_chu_de = \App\Models\chu_de::all();
        $ds_mau_sac = \App\Models\mau_sac::all();
        $ds_kich_thuoc = \App\Models\kich_thuoc::all();
        //nhà cung cấp
        $ncc_sp = DB::table('nha_cung_cap_san_pham')->where('san_pham_id', '=', $id)->get();
        $arr_ncc = stdClassToArray($ncc_sp);
        $arr_ncc_sp = Array();
        foreach ($arr_ncc as  $value) {
            $arr_ncc_sp[] = $value['ncc_id'];
        }
        // chủ đề
        $chude_sp = DB::table('chu_de_san_pham')->where('san_pham_id', '=', $id)->get();
        $arr_cd = stdClassToArray($chude_sp);
        $arr_chu_de_sp = Array();
        foreach ($arr_cd as  $value) {
            $arr_chu_de_sp[] = $value['chu_de_id'];
        }
        //màu sắc
        $mausac_sp = DB::table('mau_sac_san_pham')->where('san_pham_id', '=', $id)->get();
        $arr_ms = stdClassToArray($mausac_sp);
        $arr_mau_sac = Array();
        foreach ($arr_ms as  $value) {
            $arr_mau_sac[] = $value['mau_sac_id'];
        }
        //kích thước
        $kichthuoc_sp = DB::table('kich_thuoc_san_pham')->where('san_pham_id', '=', $id)->get();
        $arr_kt = stdClassToArray($kichthuoc_sp);
        $arr_kich_thuoc = Array();
        foreach ($arr_kt as  $value) {
            $arr_kich_thuoc[] = $value['kich_thuoc_id'];
        }
        return view('admin.sanpham.editfunction')->with('data', $ds_lsp)
                                        ->with('ncc', $ds_ncc)
                                        ->with('arr_ncc', $arr_ncc_sp)
                                        ->with('arr_chu_de', $arr_chu_de_sp)
                                        ->with('ds_chu_de', $ds_chu_de)
                                        ->with('ds_mau_sac', $ds_mau_sac)
                                        ->with('arr_mau_sac', $arr_mau_sac)
                                        ->with('arr_kich_thuoc', $arr_kich_thuoc)
                                        ->with('ds_kich_thuoc', $ds_kich_thuoc)
                                        ->with('san_pham', $san_pham);
    }
    public function store(san_pham_create_request $request)
    {
//        dd($request);
        $san_pham_ma = $request->san_pham_ma;
        $san_pham_ten_vn = $request->san_pham_ten_vn;
        $san_pham_ten_en = $request->san_pham_ten_en;
        $san_pham_gia_goc = $request->san_pham_gia_goc;
        $san_pham_gia_ban = $request->san_pham_gia_ban;
        $san_pham_mo_ta = $request->san_pham_mo_ta;
        $san_pham_trang_thai = $request->san_pham_trang_thai;
        $loai_san_pham_id = $request->loai_san_pham_id;
        
        

        
        
        $model = new \App\Models\san_pham();
        
        $model->san_pham_ma = strtoupper($san_pham_ma);
        $model->san_pham_ten_vn = $san_pham_ten_vn;
        $model->san_pham_ten = stripUnicode($san_pham_ten_vn);
        $model->san_pham_ten_en = $san_pham_ten_en;
        $model->san_pham_gia_goc = $san_pham_gia_goc;
        $model->san_pham_gia_ban = $san_pham_gia_ban;
        $model->san_pham_mo_ta = $san_pham_mo_ta;
        $model->san_pham_trang_thai = $san_pham_trang_thai;
        $model->loai_san_pham_id = $loai_san_pham_id;

        if ($request->hasFile('san_pham_hinh_anh')) {
            $file = $request->san_pham_hinh_anh;

            // Lưu tên hình vào column sp_hinh
            $model->san_pham_hinh_anh = "sp_avata_".$model->san_pham_ma.".".$file->getClientOriginalExtension();

            // Chép file vào thư mục "storate/public/photos"
            $file->storeAs('public/photos', $model->san_pham_hinh_anh);
        }
        $model->save();
        if ($request->hasFile('san_pham_hinh_anh_lien_quan')) {
            // duyệt từng ảnh và thực hiện lưu
            $files = $request->sp_hinhanhlienquan;
            foreach ($request->san_pham_hinh_anh_lien_quan as $index => $file) {
                $name_file = "sp_hinhanhlienquan_".$model->san_pham_ma."_$index.".$file->getClientOriginalExtension();
                
                $file->storeAs('public/photos', $name_file);

                // Tạo đối tưọng HinhAnh
                $hinhAnh = new \App\Models\san_pham_hinh_anh();
                $hinhAnh->san_pham_id = $model->san_pham_id;
                $hinhAnh->san_pham_hinh_anh_ten = $name_file;
                $hinhAnh->save();
            }
        }
        Session::flash('sussecs','Thêm mới thành công!');
        return redirect(route('sanpham.index'));
    }
    /**
     * Action AJAX get data edit 
     */
    public function getinfo(Request $request)
    {
        $data_find = san_pham::find($request->id);
        return response()->json(array(
            'code'  => 200,
            'data' => $data_find,
        ));
    }
    
        //update 
    public function update(san_pham_update_request $request, $id)
    {
        
        $san_pham = san_pham::find($id);
  
        $san_pham_ten_vn = $request->input('san_pham_ten_vn');
        $san_pham_ten_en = $request->input('san_pham_ten_en');
        $san_pham_gia_goc = $request->input('san_pham_gia_goc');
        $san_pham_gia_ban = $request->input('san_pham_gia_ban');
        $san_pham_mo_ta = $request->input('san_pham_mo_ta');
        $san_pham_trang_thai = $request->input('san_pham_trang_thai');
        $loai_san_pham_id = $request->input('loai_san_pham_id');
        
        $san_pham->san_pham_ten_vn = $san_pham_ten_vn;
        $san_pham->san_pham_ten = stripUnicode($san_pham_ten_vn);
        $san_pham->san_pham_ten_en = $san_pham_ten_en;
        $san_pham->san_pham_gia_goc = $san_pham_gia_goc;
        $san_pham->san_pham_gia_ban = $san_pham_gia_ban;
        $san_pham->san_pham_mo_ta = $san_pham_mo_ta;
        $san_pham->san_pham_trang_thai = $san_pham_trang_thai;
        $san_pham->loai_san_pham_id = $loai_san_pham_id;
        
        if ($request->hasFile('san_pham_hinh_anh')) {
            Storage::delete('public/photos/' . $san_pham->san_pham_hinh_anh);
            $file = $request->san_pham_hinh_anh;

            // Lưu tên hình vào column sp_hinh
            $san_pham->san_pham_hinh_anh = "sp_avata_".$san_pham->san_pham_ma.".".$file->getClientOriginalExtension();
            // Chép file vào thư mục "storate/public/photos"
            $file->storeAs('public/photos', $san_pham->san_pham_hinh_anh);
        }
        $san_pham->update();
        
        if ($request->hasFile('san_pham_hinh_anh_lien_quan')) {
            // lấy danh sách hình ảnh liên quan
            $ds_hinhanh = $san_pham->san_pham_hinh_anh()->get();
            foreach ($ds_hinhanh as $value) {
                //xóa trong thư mục
                $hinh_anh_lien_quan = $value->san_pham_hinh_anh_ten;
                Storage::delete('public/photos/' . $hinh_anh_lien_quan);
            }
            //xóa data danh sách hình ảnh liên quan trong db
            san_pham_hinh_anh::where('san_pham_id', $id)->delete();
            //foreach trong vòng lặp để lưu hình ảnh vào db
            foreach ($request->san_pham_hinh_anh_lien_quan as $index => $file) {
                $name_file = "sp_hinhanhlienquan_".$san_pham->san_pham_ma."_$index.".$file->getClientOriginalExtension();
                $file->storeAs('public/photos', $name_file);
                // Tạo đối tưọng HinhAnh
                $hinhAnh = new san_pham_hinh_anh();
                $hinhAnh->san_pham_id = $id;
                $hinhAnh->san_pham_hinh_anh_ten = $name_file;
                $hinhAnh->save();
            }
        }
        
        Session::flash('sussecs','Sửa thành công!');
        return redirect()->route('sanpham.index');
    }
        public function destroy($id)
    {
        $user = users::where('san_pham_id', $id)->first();
        $user->delete();
        $san_pham = san_pham::find($id);
        $san_pham->delete();
    }
    
    public function deleteAvatar ($id) {
         $san_pham = san_pham::find($id);
         $name_file = $san_pham->san_pham_hinh_anh;
         Storage::delete('public/photos/' . $name_file);
         $san_pham->san_pham_hinh_anh = '';
         $san_pham->update();
         $arr = [
                'chunkIndex' => '',         // the chunk index processed
                'initialPreview' => '', // the thumbnail preview data (e.g. image)
                'initialPreviewConfig' => [
                    [
                        'type' => 'image',      // check previewTypes (set it to 'other' if you want no content preview)
                        'caption' => '', // caption
                        'key' => '',       // keys for deleting/reorganizing preview
                        'fileId' => '',    // file identifier
                        'size' => '',    // file size
                        'zoomData' => '', // separate larger zoom data
                    ]
                ],
                'append' => true
            ];
            print_r(json_encode($arr)) ;
    }
    
        public function deleteimage ($id) {
        $san_pham_hinh_anh = DB::table('san_pham_hinh_anh')
                ->where('san_pham_hinh_anh_id', '=', $id)
                ->get();
        $name_file = $san_pham_hinh_anh[0]->san_pham_hinh_anh_ten;
        Storage::delete('public/photos/' . $name_file);
        DB::table('san_pham_hinh_anh')->where('san_pham_hinh_anh_id', '=', $id)->delete();
         $arr = [
                'chunkIndex' => '',         // the chunk index processed
                'initialPreview' => '', // the thumbnail preview data (e.g. image)
                'initialPreviewConfig' => [
                    [
                        'type' => 'image',      // check previewTypes (set it to 'other' if you want no content preview)
                        'caption' => '', // caption
                        'key' => '',       // keys for deleting/reorganizing preview
                        'fileId' => '',    // file identifier
                        'size' => '',    // file size
                        'zoomData' => '', // separate larger zoom data
                    ]
                ],
                'append' => true
            ];
            print_r(json_encode($arr)) ;
    }
    public function updateinfo(Request $request) {
            $id_san_pham = $request->id_san_pham;
            $arr = isset($request->nha_cung_cap_id) ? $request->nha_cung_cap_id: Array();
                DB::table('nha_cung_cap_san_pham')->where('san_pham_id', '=', $id_san_pham)->delete();
                foreach ($arr as  $value) {
                    $model = new \App\Models\nha_cung_cap_san_pham();
                    $model->ncc_id = $value;
                    $model->san_pham_id = $id_san_pham;
                    $model->save();

                }
            
            $arr_cd = isset($request->chu_de_id) ? $request->chu_de_id: Array();
            DB::table('chu_de_san_pham')->where('san_pham_id', '=', $id_san_pham)->delete();
            foreach ($arr_cd as  $value) {
                $model = new \App\Models\chu_de_san_pham();
                $model->chu_de_id = $value;
                $model->san_pham_id = $id_san_pham;
                $model->save(); 
            }
            
            $arr_ms = isset($request->mau_sac_id) ? $request->mau_sac_id: Array();
            DB::table('mau_sac_san_pham')->where('san_pham_id', '=', $id_san_pham)->delete();
            foreach ($arr_ms as  $value) {
                $model = new \App\Models\mau_sac_san_pham();
                $model->mau_sac_id = $value;
                $model->san_pham_id = $id_san_pham;
                $model->save(); 
            }
            
            $arr_kt = isset($request->kich_thuoc_id) ? $request->kich_thuoc_id: Array();
            DB::table('kich_thuoc_san_pham')->where('san_pham_id', '=', $id_san_pham)->delete();
            foreach ($arr_kt as  $value) {
                $model = new \App\Models\kich_thuoc_san_pham();
                $model->kich_thuoc_id = $value;
                $model->san_pham_id = $id_san_pham;
                $model->save(); 
            }
        Session::flash('sussecs','Thành công');
        return redirect(route('sanpham.index'));
    }
    
    public function getInfoSanPham(Request $request) {
        $data_find = DB::table('nha_cung_cap_san_pham')->where('san_pham_id', '=', $request->id)->get();
        return response()->json(array(
            'code'  => 200,
            'data' => $data_find,
        ));
    }
}
