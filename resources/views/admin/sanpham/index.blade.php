@extends('admin.layouts.master')

@section('title')
    Danh sách sản phẩm
@endsection

@section('content')
<style>
   
</style>
<link rel="stylesheet" href="{{ asset ('vendor/css/choices.min.css')}}">
<script src="{{ asset ('vendor/CustomJs/choices.min.js')}}"></script>
<div class="container-fluid">
    <a type="button" class="btn btn-primary" href="{{ route('sanpham.create') }}"><i class="fas fa-plus"></i> Thêm mới</a>
<!--    <button type="button" class="btn btn-primary" onclick="ThucHienIn();"><i class="fas fa-print"></i> In</button>
    <button type="button" class="btn btn-primary" onclick="ThucHienXuatExcel();"><i class="fas fa-file-excel"></i> Xuất excel</button>
    <button type="button" class="btn btn-primary" onclick="ThucHienXuatpdf();"><i class="fas fa-file-pdf"></i> Xuất PDF</button>-->
    
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary" align="center">Danh sách sản phẩm</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr align="center">
                                            <th width="5%">STT</th>
                                            <th width="5%">Chức năng</th>
                                            <th width ="5%">Ảnh</th>
                                            <th width ="10%">Mã</th>
                                            <th>Tên</th>
                                            <th>Tên tiếng anh</th>
                                            <th>Giá gốc</th>
                                            <th>Giá bán</th>
                                            <th>Mô tả</th>
                                            <th>Sử dụng</th>
                                            <th>Loại sản phẩm</th>
                                        </tr>
                                    </thead>
                                    
<!--                                    <tfoot>
                                        <tr>
                                            <th>Name</th>
                                            <th>Position</th>
                                            <th>Office</th>
                                            <th>Age</th>
                                            <th>Start date</th>
                                            <th>Salary</th>
                                        </tr>
                                    </tfoot>-->
                                    <tbody>
                                        @foreach ($data as $k => $v)
                                        <tr>
                                            <td align="center" style="font-weight: bold;">{{ $k + 1 }}</td>
                                            <td align="center" style="font-weight: bold;">
                                                <!--Sua-->
                                                <a class="fas fa-pen function" style="color:blue" title="Sửa" href="{{ route('sanpham.edit', ['id' => $v->san_pham_id])}}"></a>
                                                <!--Xoa-->
                                                <form name="frmXoa" method="POST" action="{{route('sanpham.destroy',['id' => $v->san_pham_id])}}"  class="delete-form" data-id = "{{ $v->san_pham_id }}">
                                                    {{ csrf_field() }}
                                                    <input type="hidden" name="_method" value="DELETE" />
                                                    <button type="submit" class="btn btn-link" ><i class="fas fa-trash-alt function" style="color:red"></i></button>
                                                </form>
                                                <!--chuc nang-->
                                                <button class="btn btn-link" style="color:blue" title="Thêm thông tin" onclick="showModalFunction({{$v->san_pham_id}});" ><i class="fas fa-cog function"></i></button>
                                                
                                            </td>
                                            <!--<td>{{ $v->san_pham_hinh_anh }}</td>-->
                                            <td align="center">
                                                @if ($v->san_pham_hinh_anh == '')
                                                    ''
                                                @else 
                                                    <img src="{{ asset('storage/photos/' . $v->san_pham_hinh_anh) }}" class="img-list" width="50px" height="50px" />
                                                @endif
                                                
                                            </td>
                                            <td>{{ $v->san_pham_ma }}</td>
                                            <td>{{ $v->san_pham_ten_vn }}</td>
                                            <td>{{ $v->san_pham_ten_en }}</td>
                                            <td class="tien-te">{{ $v->san_pham_gia_goc }} </td>
                                            <td class="tien-te">{{ $v->san_pham_gia_ban }}</td>
                                            <td>{!! $v->san_pham_mo_ta !!}</td>
                                            <td align='center'>
                                                @if ($v->san_pham_trang_thai == 1)
                                                    X
                                                @endif
                                            </td>
                                            <td>{{ $v->loai_san_pham->loai_san_pham_ten_vn }}
                                                
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>

<!-- Button trigger modal -->


<!-- Modal them moi-->
<div class="modal fade " id="modal" tabindex="-1" aria-labelledby="modal" aria-hidden="true">
  <div class="modal-dialog modal-lg ">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modal_title">Thêm thông tin cho sản phẩm</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        @include('admin.partials.error-message')
      <div class="modal-body">
        <!--form-->
        <form name="frmMain" id = "frmMain" method="POST" action="{{ route('sanpham.updateinfo') }}" enctype="multipart/form-data">
            {{ csrf_field() }}
            <input type="hidden" name="id_san_pham" id="id_san_pham">
            <div class="form-group row">
                <label for="san_pham_ma" class="col-sm-2 col-form-label">Loại</label>
                <div class="col-sm-10">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="loai_chuc_nang" id="loai_chuc_nang_ncc" value="1" checked>
                        <label class="form-check-label" for="loai_chuc_nang_ncc">
                          Nhà cung cấp
                        </label>
                      </div>
                     <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="loai_chuc_nang" id="loai_chuc_nang_" value="2">
                        <label class="form-check-label" for="san_pham_trang_thai_khong_hien_thi">
                          Không hiển thị
                        </label>
                      </div>
                </div>
            </div>  
            <div class="form-group row">
                <label for="san_pham_ma" class="col-sm-2 col-form-label">Nhà cung cấp</label>
                <div class="col-sm-10">
                    <select name="nha_cung_cap_id[]"id="choices-multiple-remove-button" placeholder="Chọn nhà cung cấp" multiple>
                        @foreach($ncc as $ncc)
                        <option id="nha_cung_cap_id_{{$ncc->ncc_id}}" value="{{ $ncc->ncc_id }}">{{ $ncc->ncc_ten_vn }}</option>
                        @endforeach
                    </select>
                </div>
                
            </div>
           
            
            <!--end form-->
      </div>
      <div class="modal-footer">
          <button type="submit" class="btn btn-primary"><i class="fas fa-download"></i> Lưu</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-undo-alt"></i> Trở về</button>
      </div>
      </form>
    </div>
  </div>
</div>

@endsection

@section('custom-scripts')
<script>
    
        $( document ).ready(function() { 
            var multipleCancelButton = new Choices('#choices-multiple-remove-button', {
                    removeItemButton: true,
                    maxItemCount:5,
                    searchResultLimit:5,
                    renderChoiceLimit:5
            });
//            $("#san_pham_hinh_anh").fileinput({
//                theme: 'fas',
//                showUpload: false,
//                showCaption: false,
//                browseClass: "btn btn-primary btn-lg",
//                fileType: "any",
//                previewFileIcon: "<i class='glyphicon glyphicon-king'></i>",
//                overwriteInitial: false
//              });
            
        @if ($errors->any())
            $('#modal').modal('show');
        @endif
        $('.delete-form').submit(function (e){
            e.preventDefault();
            Swal.fire({
                title: 'Bạn có chắt chắn?',
                text: "Dữ liệu khi xóa sẽ không thể phục hồi!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Vâng, tôi chắt chắn!'
              }).then((result) => {
                if (result.isConfirmed) {
                  $.ajax({
                    type: $(this).attr('method'),
                    url: $(this).attr('action'),
                    data: $(this).serialize(),
                    success: function () {
                        Swal.fire(
                            'Thành công!',
                            'Bạn đã xóa thành công.',
                            'success'
                          ),
                        setTimeout(function(){ 
                            location.reload();  
                        }, 1000);
                    }
            });
                }
        });
            });
        });
        function showModalFunction(id){
            
            $('#id_san_pham').val(id);
             $.ajax({
                url: '{{ route('sanpham.getInfoSanPham') }}',
                type: "GET",
                data: {
                    id: id
                },
                success: function(response) {
                    $(response.data).each(function() {
                        var data = response.data;
                        $.each(data, function( index, value ) {
                            $('#nha_cung_cap_id_'+value.ncc_id).attr('selected', 'selected');
                          });
                        $('#modal').modal('show');
                    });
                }});
            
//            $('#modal').modal('show');
        }
        
        function prepareAdd(){
            ClearErrorMessage();
            $('#san_pham_ma').val('').attr('disabled', false);
            $('#san_pham_ho_lot_vn').val('');
            $('#san_pham_ten_vn').val('');
            $('#san_pham_email').val('').attr('disabled', false);;
            $('#san_pham_sdt').val('');
            $('#san_pham_dia_chi').val('');
            $('#san_pham_hinh_anh').val('');
            $('imput[name ="_method"]').val();
            $('#_method').remove();
            $('#frmMain').attr('action', '{{ route('sanpham.store') }}');
            $('#modal').modal('show');
        }
        
        
        function prepareEdit(id, action){
            ClearErrorMessage();
        }
        
        function ThucHienIn(){
            
        }
              
</script>
@endsection

