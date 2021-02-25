@extends('admin.layouts.master')

@section('title')
    Danh sách lý do
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
                            <h6 class="m-0 font-weight-bold text-primary" align="center">Danh sách lý do</h6>
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
                                            <th>Loại lý do</th>
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
                                            <td align="center" width="5%"><i class="fas fa-pen function" style="color:blue" title="Sửa" onclick="prepareEdit({{ $v->ly_do_id }}, '{{ route('lydo.update', ['id' => $v->ly_do_id])}}')"></i></td>
                                            <td align="center" width="5%">
                                                <form name="frmXoa" method="POST" action="{{route('lydo.destroy',['id' => $v->ly_do_id])}}"  class="delete-form" data-id = "{{ $v->ly_do_id }}">
                                                    {{ csrf_field() }}
                                                    <input type="hidden" name="_method" value="DELETE" />
                                                    <button type="submit" class="btn btn-link" ><i class="fas fa-trash-alt function" style="color:red"></i></button>
                                                </form>
                                            </td>
                                            <td>{{ $v->ly_do_ma }}</td>
                                            <td>{{ $v->ly_do_ten_vn }}</td>
                                            <td>{{ $v->ly_do_ten_en }}</td>
                                            <td>
                                                @if ($v->ly_do_loai == '1')
                                                    Nhập kho
                                                @else
                                                    Xuất kho
                                                @endif
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
        <h5 class="modal-title" id="modal_title">Thêm mới màu sắc</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        @include('admin.partials.error-message')
      <div class="modal-body">
        <!--form-->
        <form name="frmMain" id = "frmMain" method="POST" action="{{ route('lydo.store') }}">
            {{ csrf_field() }}
             <div class="form-group row">
                <label for="ly_do_ma" class="col-sm-2 col-form-label">Mã</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control require-row" value="{{ old('ly_do_ma') }}" name="ly_do_ma" id="ly_do_ma" placeholder="VD: LD01, LD02, LD03..." >
                </div>
            </div>  
            <div class="form-group row">
                <label for="ly_do_ten_vn" class="col-sm-2 col-form-label">Tên tiếng việt</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control require-row" value="{{ old('ly_do_ten_vn') }}" name="ly_do_ten_vn" id="ly_do_ten_vn" placeholder="VD: Lý do 1, Lý do 2...">
                </div>
            </div>
            <div class="form-group row">
                <label for="ly_do_ten_en" class="col-sm-2 col-form-label">Tên tiếng anh</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" value="{{ old('ly_do_ten_en') }}" name="ly_do_ten_en" id="ly_do_ten_en" placeholder="Example: reason 1, reason 2, reason 3...">
                </div>
            </div>
            <div class="form-group row">
                <label for="ly_do_ten_en" class="col-sm-2 col-form-label">Loại lý do</label>
                <div class="col-sm-10">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="ly_do_loai" id="ly_do_loai_nhap" value="1" checked>
                        <label class="form-check-label" for="ly_do_loai_nhap">
                          Nhập kho
                        </label>
                      </div>
                     <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="ly_do_loai" id="ly_do_loai_xuat" value="2">
                        <label class="form-check-label" for="ly_do_loai_xuat">
                          Xuất kho
                        </label>
                      </div>
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
            $('#ly_do_ma').val('').attr('disabled', false);
            $('#ly_do_ten_vn').val('');
            $('#ly_do_ten_en').val('');
            $('imput[name ="_method"]').val();
            $('#_method').remove();
            $('#frmMain').attr('action', '{{ route('lydo.store') }}');
            $('#modal').modal('show');
        }
        
        
        function prepareEdit(id, action){
            ClearErrorMessage();
            if (id !== '') {
                $.ajax({
                url: '{{ route('lydo.info') }}',
                type: "GET",
                data: {
                    id: id
                },
                success: function(response) {
                    $(response.data).each(function() {
                        var data = response.data;
                        $('#modal_title').text('Sửa lý do');
                        $('#ly_do_ma').val(data.ly_do_ma).attr('disabled', true);
                        $('#ly_do_ten_vn').val(data.ly_do_ten_vn);
                        $('#ly_do_ten_en').val(data.ly_do_ten_en);
                        if (data.ly_do_loai == '1') {
                            $("#ly_do_loai_nhap").prop("checked", true);
                        }else{
                            $("#ly_do_loai_xuat").prop("checked", true);
                        }
                        if ($('#_method').length === 0) {                          
                            $('#ly_do_ten_en').after('<input id = "_method" type="hidden" name="_method" value="PUT" />');
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

