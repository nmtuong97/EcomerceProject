@extends('admin.layouts.master')

@section('title')
    Danh sách sản phẩm
@endsection

@section('content')
<style>
   
</style>

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
                                                <a class="fas fa-cog function" style="color:blue" title="Sửa" href="{{ route('sanpham.editfunction', ['id' => $v->san_pham_id])}}"></a>
                                                
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
        function showModalFunction(id){
//            var multipleCancelButton = null;
//            $(".choices").remove();
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
//                            $('#nha_cung_cap_id_'+value.ncc_id).attr('selected', 'selected');
                            multipleCancelButton.setValueByChoice(value.ncc_id);
                          });
                         
                        
                    });
                }});
                
            $('#modal').modal('show');
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

