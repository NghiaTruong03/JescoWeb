Website bán quần áo sử dụng Laravel Framework

Mô Tả :
- Website hiển thị thông tin sản phẩm
- Đặt hàng và thanh toán Online (Momo và Vnpay)
- Quản lý admin

Cài đặt:
- git clone https://github.com/NghiaTruong03/JescoWeb.git
- cd JescoWeb
- composer install
- cp .env.example .env
- Cập nhật file .env
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=laravel
    DB_USERNAME=root
    DB_PASSWORD=
- php artisan key:generate
- php artisan migrate
- php artisan db:seed
- php artisan storage:link
- php artisan serve
