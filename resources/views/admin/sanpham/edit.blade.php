@extends('admin.layouts.master')

@section('title')
    Chỉnh sửa sản phẩm
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
    <form name="frmMain" id = "frmMain" method="POST" action="{{ route('sanpham.update', $san_pham->san_pham_id) }}" enctype="multipart/form-data">
            {{ csrf_field() }}
            <input type="hidden" name="_method" value="PUT" />
            <div class="form-group row">
                <label for="san_pham_ma" class="col-sm-2 col-form-label">Mã sản phẩm</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control require-row" value="{{ $san_pham->san_pham_ma }}" name="san_pham_ma" id="san_pham_ma" placeholder="VD: SP001, SP002..." >
                </div>
            </div>  
            <div class="form-group row">
                <label for="san_pham_ten_vn" class="col-sm-2 col-form-label">Tên sản phẩm</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control require-row" value="{{ $san_pham->san_pham_ten_vn }}" name="san_pham_ten_vn" id="san_pham_ten_vn">
                </div>
            </div>
            <div class="form-group row">
                <label for="san_pham_ten_en" class="col-sm-2 col-form-label">Tên tiếng anh</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" value="{{ $san_pham->san_pham_ten_en }}" name="san_pham_ten_en" id="san_pham_ten_en">
                </div>
            </div>
            <div class="form-group row">
                <label for="san_pham_gia_goc" class="col-sm-2 col-form-label">Giá gốc</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control require-row tien-te" value="{{ $san_pham->san_pham_gia_goc }}" name="san_pham_gia_goc" id="san_pham_gia_goc">
                </div>
            </div>
            <div class="form-group row">
                <label for="san_pham_gia_ban" class="col-sm-2 col-form-label">Giá bán</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control require-row tien-te" value="{{ $san_pham->san_pham_gia_ban }}" name="san_pham_gia_ban" id="san_pham_gia_ban">
                </div>
            </div>
            <div class="form-group row">
                <label for="san_pham_mo_ta" class="col-sm-2 col-form-label">Mô tả sản phẩm</label>
                <div class="col-sm-10">
                    <!--<input type="text" class="form-control require-row" value="{{ old('san_pham_mo_ta') }}" name="san_pham_mo_ta" id="san_pham_mo_ta">-->
                    <textarea type="text" id="san_pham_mo_ta" class="form-control require-row" name="san_pham_mo_ta">{{ $san_pham->san_pham_mo_ta }}</textarea>
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

<!-- Button trigger modal -->

@endsection

@section('custom-scripts')
    
<script>
    
        $( document ).ready(function() { 
            $('#san_pham_ma').attr('disabled', 'disabled');
            $('input[name=san_pham_trang_thai][value={{ $san_pham->san_pham_trang_thai }}]').prop('checked', 'checked');
            $("#loai_san_pham_id option[value={{ $san_pham->loai_san_pham_id }}]").attr("selected","selected");
            
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
                allowedFileExtensions: ["jpg", "gif", "png"],
                @if ($san_pham->san_pham_hinh_anh != '')
                    initialPreview: [
                       "<img src='{{ asset('storage/photos/' . $san_pham->san_pham_hinh_anh) }}' class='file-preview-image' alt='Desert' title='Desert'>"
                       ],
                       uploadExtraData: {
                           '_token': '{{csrf_token()}}',
                       },
                       deleteExtraData: {
                           '_token': '{{csrf_token()}}',
                       },
                       initialPreviewConfig: [
                           {
                               caption: "{{ $san_pham->san_pham_hinh_anh }}", 
                               size: {{ Storage::exists('public/photos/' . $san_pham->san_pham_hinh_anh) ? Storage::size('public/photos/' . $san_pham->san_pham_hinh_anh) : 0 }}, 
                               width: "120px", 
                               url: "{{ route('sanpham.deleteavatar', $san_pham->san_pham_id) }}", 
                               key: {{ $san_pham->san_pham_id }}
                           },
                       ]      
                @endif
               
              });
            $("#san_pham_hinh_anh_lien_quan").fileinput({
                theme: 'fas',
                showUpload: false,
                showCaption: false,
                browseClass: "btn btn-primary btn-lg",
                fileType: "image",
                previewFileIcon: "<i class='glyphicon glyphicon-king'></i>",
                overwriteInitial: false,
                language: 'vi',
                allowedFileExtensions: ["jpg", "gif", "png"],
                initialPreview: [
                    @foreach($san_pham->san_pham_hinh_anh()->get() as $hinhAnh)
                    @if ($hinhAnh->san_pham_hinh_anh_ten != '')
                        "<img src='{{ asset('storage/photos/' . $hinhAnh->san_pham_hinh_anh_ten) }}' class='file-preview-image' alt='Desert' title='Desert'>",
                    @endif
                    @endforeach
                ],
                    uploadExtraData: {
                           '_token': '{{csrf_token()}}',
                       },
                       deleteExtraData: {
                           '_token': '{{csrf_token()}}',
                       },
                initialPreviewConfig: [
                    @foreach($san_pham->san_pham_hinh_anh()->get() as $index=>$hinhAnh)
                    {
                    @if ($hinhAnh->san_pham_hinh_anh_ten != '')
                        caption: "{{ $hinhAnh->san_pham_hinh_anh_ten }}", 
                        size: {{ Storage::exists('public/photos/' . $hinhAnh->san_pham_hinh_anh_ten) ? Storage::size('public/photos/' . $hinhAnh->san_pham_hinh_anh_ten) : 0 }}, 
                        width: "120px", 
                        url: "{{ route('sanpham.deleteimage', $hinhAnh->san_pham_hinh_anh_id) }}", 
                        key: {{ $hinhAnh->san_pham_hinh_anh_id }},
                    @endif       
                    },
                    @endforeach
                ]
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
            if (id !== '') {
                $.ajax({
                url: '{{ route('sanpham.info') }}',
                type: "GET",
                data: {
                    id: id
                },
                success: function(response) {
                    $(response.data).each(function() {
                        var data = response.data;
                        $('#modal_title').text('Sửa sản phẩm');
                        $('#san_pham_ma').val(data.san_pham_ma).attr('disabled', true);
                        $('#san_pham_ho_lot_vn').val(data.san_pham_ho_lot_vn);
                        $('#san_pham_ten_vn').val(data.san_pham_ten_vn);
                        $('#san_pham_email').val(data.san_pham_email).attr('disabled', true);;
                        $('#san_pham_sdt').val(data.san_pham_sdt);
                        $('#san_pham_dia_chi').val(data.san_pham_dia_chi);
                        $('input[name=san_pham_gioi_tinh][value='+data.san_pham_gioi_tinh+']').prop('checked', 'checked');
                        $('input[name=san_pham_admin][value='+data.san_pham_admin+']').prop('checked', 'checked');
                        

                        if ($('#_method').length === 0) {                          
                            $('#san_pham_ma').after('<input id = "_method" type="hidden" name="_method" value="PUT" />');
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

