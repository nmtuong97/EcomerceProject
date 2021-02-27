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
    
    <link rel="stylesheet" href="{{ asset ('vendor/css/choices.min.css')}}">
    <script src="{{ asset ('vendor/CustomJs/choices.min.js')}}"></script>
<style>

</style>
<div class="container-fluid">
    <!--<a class="btn btn-primary" href="{{route('sanpham.index')}}"><i class="fas fa-undo-alt"></i> Trở về</a>-->    
    <div class="col-12 h2" align='center'>Cập nhật thông tin của sản phẩm: {{ $san_pham->san_pham_ten_vn }}</div>
    @include('admin.partials.error-message')
    <form name="frmMain" id = "frmMain" method="POST" action="{{ route('sanpham.updateinfo') }}" enctype="multipart/form-data">
            {{ csrf_field() }}
            <input type="hidden" name="id_san_pham" id="id_san_pham" value="{{ $san_pham->san_pham_id }}">
            <div class="form-group row">
                <label for="san_pham_ma" class="col-sm-2 col-form-label">Nhà cung cấp</label>
                <div class="col-sm-10">
                    <select name="nha_cung_cap_id[]"id="nha_cung_cap" placeholder="Chọn nhà cung cấp" multiple>
                        @foreach($ncc as $ncc)
                        @if (in_array($ncc->ncc_id, $arr_ncc))
                            <option value="{{ $ncc->ncc_id }}" selected="selected">{{ $ncc->ncc_ten_vn }}</option>
                        @else
                            <option value="{{ $ncc->ncc_id }}" >{{ $ncc->ncc_ten_vn }}</option>
                        @endif
                            
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="san_pham_ma" class="col-sm-2 col-form-label">Chủ đề</label>
                <div class="col-sm-10">
                    <select name="chu_de_id[]"id="chu_de_id" placeholder="Chọn chủ đề cho sản phẩm" multiple>
                        @foreach($ds_chu_de as $chu_de)
                        @if (in_array($chu_de->chu_de_id, $arr_chu_de))
                            <option value="{{ $chu_de->chu_de_id }}" selected="selected">{{ $chu_de->chu_de_ten_vn }}</option>
                        @else
                            <option value="{{ $chu_de->chu_de_id }}" >{{ $chu_de->chu_de_ten_vn }}</option>
                        @endif
                            
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="mau_sac_id" class="col-sm-2 col-form-label">Màu sắc</label>
                <div class="col-sm-10">
                    <select name="mau_sac_id[]"id="mau_sac_id" placeholder="Chọn màu sắc cho sản phẩm" multiple>
                        @foreach($ds_mau_sac as $mau_sac)
                        @if (in_array($mau_sac->mau_sac_id, $arr_mau_sac))
                            <option value="{{ $mau_sac->mau_sac_id }}" selected="selected">{{ $mau_sac->mau_sac_ten_vn }}</option>
                        @else
                            <option value="{{ $mau_sac->mau_sac_id }}" >{{ $mau_sac->mau_sac_ten_vn }}</option>
                        @endif
                            
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="mau_sac_id" class="col-sm-2 col-form-label">Kích thước</label>
                <div class="col-sm-10">
                    <select name="kich_thuoc_id[]"id="kich_thuoc_id" placeholder="Chọn kích thước cho sản phẩm" multiple>
                        @foreach($ds_kich_thuoc as $kich_thuoc)
                        @if (in_array($kich_thuoc->kich_thuoc_id, $arr_kich_thuoc))
                            <option value="{{ $kich_thuoc->kich_thuoc_id }}" selected="selected">{{ $kich_thuoc->kich_thuoc_ten_vn }}</option>
                        @else
                            <option value="{{ $kich_thuoc->kich_thuoc_id }}" >{{ $kich_thuoc->kich_thuoc_ten_vn }}</option>
                        @endif
                            
                        @endforeach
                    </select>
                </div>
            </div>
            <!--end form-->
      </div>
      <div class="modal-footer">
          <button type="submit" class="btn btn-primary"><i class="fas fa-download"></i> Lưu</button>
          <!--<button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-undo-alt"></i> Trở về</button>-->
          <a href="{{ route('sanpham.index') }}" class="btn btn-primary "><i class="fas fa-undo-alt"></i> Trở về</a>
      </div>
      </form>
    
    

</div>

<!-- Button trigger modal -->

@endsection

@section('custom-scripts')
    
<script>
    
        $( document ).ready(function() { 
            
            
            var  nha_cung_cap = new Choices('#nha_cung_cap', {
                        removeItemButton: true,
                        maxItemCount:100,
                        searchResultLimit:100,
                        renderChoiceLimit:100,
                        loadingText: 'Đang tải...',
                        noResultsText: 'Không tìm thấy thông tin',
                        noChoicesText: 'Không còn thông tin để chọn',
                        itemSelectText: 'Click vào để chọn',
                }); 
            var  chu_de_id = new Choices('#chu_de_id', {
                        removeItemButton: true,
                        maxItemCount:100,
                        searchResultLimit:100,
                        renderChoiceLimit:100,
                        loadingText: 'Đang tải...',
                        noResultsText: 'Không tìm thấy thông tin',
                        noChoicesText: 'Không còn thông tin để chọn',
                        itemSelectText: 'Click vào để chọn',
                }); 
            var  mau_sac_id = new Choices('#mau_sac_id', {
                        removeItemButton: true,
                        maxItemCount:100,
                        searchResultLimit:100,
                        renderChoiceLimit:100,
                        loadingText: 'Đang tải...',
                        noResultsText: 'Không tìm thấy thông tin',
                        noChoicesText: 'Không còn thông tin để chọn',
                        itemSelectText: 'Click vào để chọn',
                }); 
            var  kich_thuoc_id = new Choices('#kich_thuoc_id', {
                        removeItemButton: true,
                        maxItemCount:100,
                        searchResultLimit:100,
                        renderChoiceLimit:100,
                        loadingText: 'Đang tải...',
                        noResultsText: 'Không tìm thấy thông tin',
                        noChoicesText: 'Không còn thông tin để chọn',
                        itemSelectText: 'Click vào để chọn',
                }); 
            
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
        }
        
        function ThucHienIn(){
            
        }
              
</script>
@endsection

