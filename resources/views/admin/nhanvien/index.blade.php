@extends('admin.layouts.master')

@section('title')
    Danh sách nhân viên
@endsection

@section('content')
<style>
   
</style>
<div class="container-fluid">
    <button type="button" class="btn btn-primary" onclick="prepareAdd();"><i class="fas fa-plus"></i> Thêm mới</button>
<!--    <button type="button" class="btn btn-primary" onclick="ThucHienIn();"><i class="fas fa-print"></i> In</button>
    <button type="button" class="btn btn-primary" onclick="ThucHienXuatExcel();"><i class="fas fa-file-excel"></i> Xuất excel</button>
    <button type="button" class="btn btn-primary" onclick="ThucHienXuatpdf();"><i class="fas fa-file-pdf"></i> Xuất PDF</button>-->
    
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary" align="center">Danh sách nhân viên</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr align="center">
                                            <th width="5%">STT</th>
                                            <th width ="10%">Ảnh</th>
                                            <th width ="15%">Mã</th>
                                            <th>Tên</th>
                                            <th>Username</th>
                                            <th>Giới tính</th>
                                            <th>Địa chỉ</th>
                                            <th>SĐT</th>
                                            <th>Email</th>
                                            <th>Quyền</th>
                                            <th>Sửa</th>
                                            <th>Xóa</th>
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
                                            <td>{{ $v->nhan_vien_hinh_anh }}</td>
                                            <td>{{ $v->nhan_vien_ho_lot_vn }} {{ $v->nhan_vien_ten_vn }}</td>
                                            <td>{{ $v->nhan_vien_username }}</td>
                                            <td>{{ $v->nhan_vien_gioi_tinh }}</td>
                                            <td>{{ $v->nhan_vien_dia_chi }}</td>
                                            <td>{{ $v->nhan_vien_sdt }}</td>
                                            <td>{{ $v->nhan_vien_email }}</td>
                                            <td>{{ $v->nhan_vien_admin }}</td>
                                            <td align="center" width="5%"><i class="fas fa-pen function" style="color:blue" title="Sửa" onclick="prepareEdit({{ $v->nhan_vien_id }}, '{{ route('nhanvien.update', ['id' => $v->nhan_vien_id])}}')"></i></td>
                                            <td align="center" width="5%">
                                                <form name="frmXoa" method="POST" action="{{route('nhanvien.destroy',['id' => $v->nhan_vien_id])}}"  class="delete-form" data-id = "{{ $v->nhan_vien_id }}">
                                                    {{ csrf_field() }}
                                                    <input type="hidden" name="_method" value="DELETE" />
                                                    <button type="submit" class="btn btn-link" ><i class="fas fa-trash-alt function" style="color:red"></i></button>
                                                </form>
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
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modal_title">Thêm mới nhân viên</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        @include('admin.partials.error-message')
      <div class="modal-body">
        <!--form-->
        <form name="frmMain" id = "frmMain" method="POST" action="{{ route('nhanvien.store') }}" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group row">
                <label for="nhan_vien_ma" class="col-sm-2 col-form-label">Mã</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control require-row" value="{{ old('nhan_vien_ma') }}" name="nhan_vien_ma" id="nhan_vien_ma" placeholder="VD: NV001, NV002..." >
                </div>
            </div>  
            <div class="form-group row">
                <label for="nhan_vien_ho_lot_vn" class="col-sm-2 col-form-label">Họ lót</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control require-row" value="{{ old('nhan_vien_ho_lot_vn') }}" name="nhan_vien_ho_lot_vn" id="nhan_vien_ho_lot_vn">
                </div>
            </div>
            <div class="form-group row">
                <label for="nhan_vien_ten_vn" class="col-sm-2 col-form-label">Tên</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" value="{{ old('nhan_vien_ten_vn') }}" name="nhan_vien_ten_vn" id="nhan_vien_ten_vn">
                </div>
            </div>
            <div class="form-group row">
                <label for="nhan_vien_gioi_tinh" class="col-sm-2 col-form-label">Giới tính</label>
                <div class="col-sm-10">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="nhan_vien_gioi_tinh" id="nhan_vien_gioi_tinh_nam" value="1" checked>
                        <label class="form-check-label" for="nhan_vien_gioi_tinh_nam">
                          Nam
                        </label>
                      </div>
                     <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="nhan_vien_gioi_tinh" id="nhan_vien_gioi_tinh_nu" value="2">
                        <label class="form-check-label" for="nhan_vien_gioi_tinh_nu">
                          Nữ
                        </label>
                      </div>
                </div>
            </div>
            <div class="form-group row">
                <label for="nhan_vien_email" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" value="{{ old('nhan_vien_email') }}" name="nhan_vien_email" id="nhan_vien_email">
                </div>
            </div>
            <div class="form-group row">
                <label for="nhan_vien_sdt" class="col-sm-2 col-form-label">Số điện thoại</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" value="{{ old('nhan_vien_sdt') }}" name="nhan_vien_sdt" id="nhan_vien_sdt">
                </div>
            </div>
            <div class="form-group row">
                <label for="nhan_vien_dia_chi" class="col-sm-2 col-form-label">Địa chỉ</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" value="{{ old('nhan_vien_dia_chi') }}" name="nhan_vien_dia_chi" id="nhan_vien_dia_chi">
                </div>
            </div>
            <div class="form-group row">
                <label for="nhan_vien_admin" class="col-sm-2 col-form-label">Quyền</label>
                <div class="col-sm-10">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="nhan_vien_admin" id="nhan_vien_admin_nv" value="1" checked>
                        <label class="form-check-label" for="nhan_vien_admin_nv">
                          Nhân viên
                        </label>
                      </div>
                     <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="nhan_vien_admin" id="nhan_vien_admin_admin" value="2">
                        <label class="form-check-label" for="nhan_vien_admin_admin">
                          Admin
                        </label>
                      </div>
                </div>
            </div>
            <div class="form-group">
                <div class="file-loading">
                  <label>Ảnh nhân viên</label>
                  <input id="nhan_vien_hinh_anh" type="file" name="nhan_vien_hinh_anh">
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
            
            $("#nhan_vien_hinh_anh").fileinput({
                theme: 'fas',
                showUpload: false,
                showCaption: false,
                browseClass: "btn btn-primary btn-lg",
                fileType: "any",
                previewFileIcon: "<i class='glyphicon glyphicon-king'></i>",
                overwriteInitial: false
              });
            
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
        
        function prepareAdd(){
            ClearErrorMessage();
            $('#nhan_vien_ma').val('').attr('disabled', false);
            $('#nhan_vien_ten_vn').val('');
            $('#nhan_vien_ten_en').val('');
            $('imput[name ="_method"]').val();
            $('#_method').remove();
            $('#frmMain').attr('action', '{{ route('nhanvien.store') }}');
            $('#modal').modal('show');
        }
        
        
        function prepareEdit(id, action){
            ClearErrorMessage();
            if (id !== '') {
                $.ajax({
                url: '{{ route('nhanvien.info') }}',
                type: "GET",
                data: {
                    id: id
                },
                success: function(response) {
                    $(response.data).each(function() {
                        var data = response.data;
                        $('#modal_title').text('Sửa nhân viên');
                        $('#nhan_vien_ma').val(data.nhan_vien_ma).attr('disabled', true);
                        $('#nhan_vien_ten_vn').val(data.nhan_vien_ten_vn);
                        $('#nhan_vien_ten_en').val(data.nhan_vien_ten_en);
                        if ($('#_method').length === 0) {                          
                            $('#nhan_vien_ten_en').after('<input id = "_method" type="hidden" name="_method" value="PUT" />');
                        }
                        $('#frmMain').attr('action', action);
                        $('#modal').modal('show');
                    });
                }
            });
        }  
        }
        
        function ThucHienIn(){
            
        }
              
</script>
@endsection

