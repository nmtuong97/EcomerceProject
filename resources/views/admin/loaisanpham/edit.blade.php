@extends('backend.layouts.master')

@section('title')
    Sửa loại sản phẩm
@endsection

@section('content')
<form name="frmUpdate" method="POST" action="{{ route('admin.loaisanpham.update', ['id' => $loai->l_ma]) }}">
  <div class="form-group">
    <br>
  </div>
    {{ csrf_field() }}
    <input type="hidden" name="_method" value="PUT" />
  <div class="form-group">
    <label for="exampleInputPassword1">Tên loại sản phẩm</label>
    <input type="text" name="l_ten" value="{{ $loai->l_ten }}" class="form-control" id="exampleInputPassword1" placeholder="Tên loại sản phẩm">
  </div>
  <div class="form-group form-check">
      <input type="checkbox" value="1" name="l_trangthai" class="form-check-input" id="exampleCheck1" {{ $loai->l_trangThai == 1 ? "checked=checked'" : '' }}>
    <label class="form-check-label" for="exampleCheck1">Sử dụng</label>
  </div>
  <button type="submit" class="btn btn-primary">Lưu</button>
</form>

@endsection