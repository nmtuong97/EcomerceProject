@extends('admin.layouts.master')

@section('title')
    Danh sách loại sản phẩm
@endsection

@section('content')


<div class="container-fluid">
    <a class='btn btn-primary' href=''><i class="fas fa-plus"></i></span> Thêm mới</a>

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
                                            <th width ="15%">Mã</th>
                                            <th>Tên</th>
                                            <th>Tên tiếng anh</th>
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
                                            <td>{{ $v->loai_san_pham_ma }}</td>
                                            <td>{{ $v->loai_san_pham_ten_vn }}</td>
                                            <td>{{ $v->loai_san_pham_ten_eng }}</td>
                                            <td align="center" width="5%"><i class="fas fa-pen" style="color:blue"></i></td>
                                            <td align="center" width="5%"><i class="fas fa-trash-alt" style="color:red"></i></td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>

@endsection

@section('custom-scripts')
<script>
        $( document ).ready(function() { 
        //    $('#d 
        $('#dataTable').DataTable( {
            responsive: true,
            fixedHeader: true,
            "language": {
                "lengthMenu": "Hiển thị _MENU_ dòng trên trang",
                "zeroRecords": "Không tìm thấy dữ liệu",
                "info": "Trang _PAGE_ trên tổng _PAGES_ trang",
                "infoEmpty": "Không có dữ liệu",
                "search":         "Tìm kiếm:",
                "infoFiltered": "(filtered from _MAX_ total records)",
                "paginate": {
                    "first":      "Trang đầu",
                    "last":       "Trang cuối",
                    "next":       "Trang sau",
                    "previous":   "Trang trước"
                },
                "loadingRecords": "Đang tìm kiếm...",
                "processing":     "Đang xử lý...",
        }
        } );
    

        
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
                          )
                        setTimeout(function(){ 
                            location.reload();  
                        }, 1500);
                    }
                  })
                }
              })
            });
        });
        
        
</script>
@endsection

