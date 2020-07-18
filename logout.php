<?php
session_start();
if (isset($_SESSION['user'])) {
    // session[user] này chính là cái session ta đã lưu khi ta đăng nhập thành công
    // kiểm tra nếu ta đã khởi tạo session của user
    // thì sẽ gọi hàm session_unset
    // nó sẽ xoá sạch các session lưu trong bộ nhớ
    // mà session để nhận biết ta đã đăng nhập thành công
    // có session thì khi vô trang web sẽ biết ta đã đăng nhập ko bắt đăng nhập lại nữa
    // nên khi xoá hết session trang web của ta sẽ hiểu là ta chưa đăng nhập
    // vậy là ta đã đăng xuất thành công r đấy
    session_unset();
    header('Location:index.php');
    // sau đó chuyển trang này sang trang index :))
}
