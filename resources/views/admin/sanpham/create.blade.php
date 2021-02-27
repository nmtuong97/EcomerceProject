@extends('admin.layouts.master')

@section('title')
    Thêm mới sản phẩm
@endsection

@section('content')
    <link href="{{ asset ('vendor/bootstrap-fileinput/css/fileinput.min.css') }}" media="all" rel="stylesheet" type="text/css" />
    <script src="{{ asset ('vendor/bootstrap-fileinput/js/fileinput.min.js') }}"></script>
    <script src="{{ asset ('vendor/bootstrap-fileinput/js/fileinput.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap-fileinput/js/plugins/sortable.js') }}" type="text/javascript"></script>
    <script src="{{ asset('vendor/bootstrap-fileinput/js/locales/vi.js') }}" type="text/javascript"></script>
    <script src="{{ asset('vendor/bootstrap-fileinput/themes/explorer-fas/theme.js') }}" type="text/javascript"></script>
    <script src="{{ asset('vendor/bootstrap-fileinput/themes/fas/theme.js') }}" type="text/javascript"></script>
    <script src="{{ asset('vendor/tinymce/tinymce.min.js') }}" type="text/javascript"></script>
<style>

</style>
<div class="container-fluid">
    <!--<a class="btn btn-primary" href="{{route('sanpham.index')}}"><i class="fas fa-undo-alt"></i> Trở về</a>-->    
    @include('admin.partials.error-message')
    <form name="frmMain" id = "frmMain" method="POST" action="{{ route('sanpham.store') }}" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group row">
                <label for="san_pham_ma" class="col-sm-2 col-form-label">Mã sản phẩm</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control require-row" value="{{ old('san_pham_ma') }}" name="san_pham_ma" id="san_pham_ma" placeholder="VD: SP001, SP002..." >
                </div>
            </div>  
            <div class="form-group row">
                <label for="san_pham_ten_vn" class="col-sm-2 col-form-label">Tên sản phẩm</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control require-row" value="{{ old('san_pham_ten_vn') }}" name="san_pham_ten_vn" id="san_pham_ten_vn">
                </div>
            </div>
            <div class="form-group row">
                <label for="san_pham_ten_en" class="col-sm-2 col-form-label">Tên tiếng anh</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" value="{{ old('san_pham_ten_en') }}" name="san_pham_ten_en" id="san_pham_ten_en">
                </div>
            </div>
            <div class="form-group row">
                <label for="san_pham_gia_goc" class="col-sm-2 col-form-label">Giá gốc</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control require-row tien-te" value="{{ old('san_pham_gia_goc') }}" name="san_pham_gia_goc" id="san_pham_gia_goc">
                </div>
            </div>
            <div class="form-group row">
                <label for="san_pham_gia_ban" class="col-sm-2 col-form-label">Giá bán</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control require-row tien-te" value="{{ old('san_pham_gia_ban') }}" name="san_pham_gia_ban" id="san_pham_gia_ban">
                </div>
            </div>
            <div class="form-group row">
                <label for="san_pham_mo_ta" class="col-sm-2 col-form-label">Mô tả sản phẩm</label>
                <div class="col-sm-10">
                    <!--<input type="text" class="form-control require-row" value="{{ old('san_pham_mo_ta') }}" name="san_pham_mo_ta" id="san_pham_mo_ta">-->
                    <textarea type="text" id="san_pham_mo_ta" class="form-control require-row" name="san_pham_mo_ta">{{ old('san_pham_mo_ta') }}</textarea>
                </div>
            </div>
            
            
            <div class="form-group row">
                <label for="san_pham_trang_thai" class="col-sm-2 col-form-label">Trạng thái</label>
                <div class="col-sm-10">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="san_pham_trang_thai" id="san_pham_trang_thai_hien_thi" value="1" checked>
                        <label class="form-check-label" for="san_pham_trang_thai_hien_thi">
                          Hiển thị
                        </label>
                      </div>
                     <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="san_pham_trang_thai" id="san_pham_trang_thai_khong_hien_thi" value="2">
                        <label class="form-check-label" for="san_pham_trang_thai_khong_hien_thi">
                          Không hiển thị
                        </label>
                      </div>
                </div>
            </div>
            <div class="form-group row">
                <label for="loai_san_pham_id" class="col-sm-2 col-form-label require-row">Loại sản phẩm</label>
                <div class="col-sm-10">
                    <select class="form-control" name="loai_san_pham_id" id="loai_san_pham_id">
                    
                    @foreach ($data as $k => $v)
                        <option value="{{ $v->loai_san_pham_id }}">{{ $v->loai_san_pham_ten_vn }}</option>
                    @endforeach
                  </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="san_pham_hinh_anh" class="col-sm-2 col-form-label">Ảnh đại diện sản phẩm</label>
                <div class="col-sm-10">
                    <div class="file-loading">
                        <input id="san_pham_hinh_anh" type="file" name="san_pham_hinh_anh">
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label for="san_pham_hinh_anh_lien_quan" class="col-sm-2 col-form-label">Ảnh liên quan</label>
                <div class="col-sm-10">
                    <div class="file-loading">
                        <input id="san_pham_hinh_anh_lien_quan" type="file" name="san_pham_hinh_anh_lien_quan[]" multiple>
                    </div>
                </div>
            </div>
            
            <!--end form-->
      </div>
      <div class="modal-footer">
          <button type="submit" class="btn btn-primary"><i class="fas fa-download"></i> Lưu</button>
      </div>
      </form>
</div>


@endsection

@section('custom-scripts')
    
<script>
    
            $( document ).ready(function() { 
                tinymce.init({
                selector: '#san_pham_mo_ta'
            });
            $("#san_pham_hinh_anh").fileinput({
                theme: 'fas',
                showUpload: false,
                showCaption: false,
                browseClass: "btn btn-primary btn-lg",
                fileType: "any",
                previewFileIcon: "<i class='glyphicon glyphicon-king'></i>",
                overwriteInitial: false,
                language: 'vi',
                allowedFileExtensions: ["jpg", "gif", "png"]
              });
            $("#san_pham_hinh_anh_lien_quan").fileinput({
                theme: 'fas',
                showUpload: false,
                showCaption: false,
                browseClass: "btn btn-primary btn-lg",
                fileType: "any",
                previewFileIcon: "<i class='glyphicon glyphicon-king'></i>",
                overwriteInitial: false,
                language: 'vi',
                allowedFileExtensions: ["jpg", "gif", "png"]
              });
            
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
        
       
        
        function ThucHienIn(){
            
        }
              
</script>
@endsection

