@extends('backend.layouts.master')

@section('title')
    Thêm mới loại sản phẩm
@endsection

@section('content')
<form name="frmThemmoi" method="POST" action="{{ route('admin.loaisanpham.store') }}">
  <div class="form-group">
    <br>
  </div>
    {{ csrf_field() }}
  <div class="form-group">
    <label for="exampleInputPassword1">Tên loại sản phẩm</label>
    <input type="text" name="l_ten" value="{{ old('l_ten') }}" class="form-control" id="exampleInputPassword1" placeholder="Tên loại sản phẩm">
  </div>
  <div class="form-group form-check">
      <input type="checkbox" value="1" name="l_trangthai" class="form-check-input" id="exampleCheck1" {{ old('l_trangthai') == 1 ? "checked=checked'" : '' }}>
    <label class="form-check-label" for="exampleCheck1">Sử dụng</label>
  </div>
  <button type="submit" class="btn btn-primary">Lưu</button>
</form>

@endsection