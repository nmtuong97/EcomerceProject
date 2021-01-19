<!-- DIV hiển thị thông báo lỗi start -->
@if ($errors->any())
<div id='error-message' class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<!-- DIV hiển thị thông báo lỗi end -->