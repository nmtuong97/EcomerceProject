@extends('admin.layouts.master')

@section('title')
    Danh sách loại sản phẩm
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
                            <h6 class="m-0 font-weight-bold text-primary" align="center">Danh sách loại sản phẩm</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr align="center">
                                            <th width="5%">STT</th>
                                            <th>Sửa</th>
                                            <th>Xóa</th>
                                            <th width ="15%">Mã</th>
                                            <th>Tên</th>
                                            <th>Tên tiếng anh</th>
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
                                            <td align="center" width="5%"><i class="fas fa-pen function" style="color:blue" title="Sửa" onclick="prepareEdit({{ $v->loai_san_pham_id }}, '{{ route('loaisanpham.update', ['id' => $v->loai_san_pham_id])}}')"></i></td>
                                            <td align="center" width="5%">
                                                <form name="frmXoa" method="POST" action="{{route('loaisanpham.destroy',['id' => $v->loai_san_pham_id])}}"  class="delete-form" data-id = "{{ $v->loai_san_pham_id }}">
                                                    {{ csrf_field() }}
                                                    <input type="hidden" name="_method" value="DELETE" />
                                                    <button type="submit" class="btn btn-link" ><i class="fas fa-trash-alt function" style="color:red"></i></button>
                                                </form>
                                            </td>
                                            <td>{{ $v->loai_san_pham_ma }}</td>
                                            <td>{{ $v->loai_san_pham_ten_vn }}</td>
                                            <td>{{ $v->loai_san_pham_ten_eng }}</td>
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
        <h5 class="modal-title" id="modal_title">Thêm mới loại sản phẩm</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        @include('admin.partials.error-message')
      <div class="modal-body">
        <!--form-->
        <form name="frmMain" id = "frmMain" method="POST" action="{{ route('loaisanpham.store') }}">
            {{ csrf_field() }}
            <div class="form-group row">
                <label for="loai_san_pham_ma" class="col-sm-2 col-form-label">Mã</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control require-row" value="{{ old('loai_san_pham_ma') }}" name="loai_san_pham_ma" id="loai_san_pham_ma" placeholder="VD: SP001" >
                </div>
            </div>  
            <div class="form-group row">
                <label for="loai_san_pham_ten_vn" class="col-sm-2 col-form-label">Tên tiếng việt</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control require-row" value="{{ old('loai_san_pham_ten_vn') }}" name="loai_san_pham_ten_vn" id="loai_san_pham_ten_vn" placeholder="VD: Giày dép nam">
                </div>
            </div>
            <div class="form-group row">
                <label for="loai_san_pham_ten_en" class="col-sm-2 col-form-label">Tên tiếng anh</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" value="{{ old('loai_san_pham_ten_en') }}" name="loai_san_pham_ten_en" id="loai_san_pham_ten_en" placeholder="Example: Men's shoes">
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
                            'Xóa!',
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
            $('#loai_san_pham_ma').val('').attr('disabled', false);
            $('#loai_san_pham_ten_vn').val('');
            $('#loai_san_pham_ten_en').val('');
            $('imput[name ="_method"]').val();
            $('#_method').remove();
            $('#frmMain').attr('action', '{{ route('loaisanpham.store') }}');
            $('#modal').modal('show');
        }
        
        
        function prepareEdit(id, action){
            ClearErrorMessage();
            if (id !== '') {
                $.ajax({
                url: '{{ route('loaisanpham.info') }}',
                type: "GET",
                data: {
                    id: id
                },
                success: function(response) {
                    $(response.data).each(function() {
                        var data = response.data;
                        $('#modal_title').text('Sửa loại sản phẩn');
                        $('#loai_san_pham_ma').val(data.loai_san_pham_ma).attr('disabled', true);
                        $('#loai_san_pham_ten_vn').val(data.loai_san_pham_ten_vn);
                        $('#loai_san_pham_ten_en').val(data.loai_san_pham_ten_en);
                        if ($('#_method').length === 0) {                          
                            $('#loai_san_pham_ten_en').after('<input id = "_method" type="hidden" name="_method" value="PUT" />');
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

