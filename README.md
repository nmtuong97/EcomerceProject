# Thông tin về Tác giả
Mã sinh viên: ...
Họ tên: ...

# Hướng dẫn cách sử dụng dự án
## Step 1: Clone source dự án
Thực thi câu lệnh sau:
```
git clone <link đường dẫn github>
```

## Step 2: Khởi tạo, kết nối database
Hiệu chỉnh file .env
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=tendatabase
DB_USERNAME=root
DB_PASSWORD=matkhau
```

## Step 3: Tạo database, thực hiện migrate
- Tạo database <tengido>, chuẩn bảng mã `utf8mb4_unicode_ci`
- Thực thi câu lệnh khởi tạo cấu trúc bảng
```
php artisan migrate
```

## Step 4: tạo dữ liệu mẫu
- Thực thi câu lệnh
```
php artisan db:seed
```

## Step 5: tạo domain ảo
- Tạo domain ảo với <tengido.local>

## Step 6: thông tin tài khoản truy cập hệ thống
Tài khoản Admin:
admin / 123456

Tài khoản Quản lý kho:
kho / 123456

Tài khoản Khách hàng:
khachhang / 123456
...
