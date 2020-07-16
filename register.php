<!doctype html>
<html lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Shop thời trang</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="manifest" href="site.webmanifest">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">

    <!-- CSS here -->
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
        <link rel="stylesheet" href="assets/css/flaticon.css">
        <link rel="stylesheet" href="assets/css/slicknav.css">
        <link rel="stylesheet" href="assets/css/animate.min.css">
        <link rel="stylesheet" href="assets/css/magnific-popup.css">
        <link rel="stylesheet" href="assets/css/fontawesome-all.min.css">
        <link rel="stylesheet" href="assets/css/themify-icons.css">
        <link rel="stylesheet" href="assets/css/slick.css">
        <link rel="stylesheet" href="assets/css/nice-select.css">
        <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
<?php
ob_start();
//  ob_start sẽ khởi động quá trình bắt đầu ghi cache.
// Những gì mà máy chủ tính toán xử lý  sau hàm này và xuất kết quả ra sẽ được lưu vào bộ nhớ đệm
include "header.php";
include "control/loginControl.php";
registerUser();
ob_end_flush();
// ob_end_flush cũng tương tự như ob_end_clean nhưng trước khi giải phóng bộ nhớ đệm,
// nó sẽ gửi kết quả đến cho browser một lần nữa.
?>

    <!-- slider Area Start-->
    <div class="slider-area ">
        <!-- Mobile Menu -->
        <div class="single-slider slider-height2 d-flex align-items-center" data-background="assets/img/hero/category.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="hero-cap text-center">
                            <h2>Register</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- slider Area End-->

    <!--================login_part Area =================-->
    <section class="login_part section_padding ">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6">
                    <div class="login_part_text text-center">
                        <div class="login_part_text_iner">
                            <h2>New to our Shop?</h2>
                            <p>There are advances being made in science and technology
                                everyday, and a good example of this is the</p>
                            <a href="login.php" class="btn_3">Already Account!!</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="login_part_form">
                        <div class="login_part_form_iner">
                            <h3>Welcome To ! <br>
                                Please Sign Up now</h3>
                            <!-- đến trang này ta sẽ bắt đầu tương tác với form trong php -->
                            <!-- ở đây chúng ta sẽ không dùng đến Get để gửi dữ liệu nữa -->
                            <!-- mà ta sẽ dùng Post để có thể gửi và nhận dữ liệu -->
                            <!-- Post sẽ gửi dữ liệu thông qua form nên dữ liệu của nó sẽ bị ẩn đi-->
                            <!-- Tại sao ở đây a lại dùng Post mà lại không dùng Get -->
                            <!-- Get nó sẽ lấy dữ liệu ở trên url nên nó sẽ rất kém bảo mật -->
                            <!-- với những cái liên quan đến đăng nhập,thanh toán thì ta không nên -->
                            <!-- đụng tới cái Get mà hãy dùng đến Post để tăng tính bảo mật -->
                            <form class="row contact_form" method="post" novalidate="novalidate">
                            <!-- ở thẻ form nếu muốn dùng post hay get ta chỉ cần thay đổi chổ method -->
                                <div class="col-md-12 form-group p_star">
                                    <input type="text" class="form-control" id="name" name="name" value="<?php echo $nameRe ?>"
                                        placeholder="Username">
                                    <!-- ở đây a sẽ gán value cho thẻ input bằng một cái biến a tạo trong loginControl -->
                                    <!-- nó sẽ có nhiệm vụ như khi a đăng ký bị sai nó sẽ không mất đi hết tất cả những gì a vừa ghi -->
                                    <!-- mà nó sẽ vần còn a chỉ việc sửa lại sao cho đúng yêu cầu là đc -->
                                </div>
                                <div class="col-md-12 form-group p_star">
                                    <input type="password" class="form-control" id="password" name="password" value="<?php echo $passRe ?>"
                                        placeholder="Password">
                                </div>
                                <div class="col-md-12 form-group p_star">
                                    <input type="password" class="form-control" id="password" name="rePassword" value="<?php echo $repassRe ?>"
                                        placeholder="Repeat Password">
                                </div>
                                <!-- ở chổ password và repassword thì cũng tương tự a cũng không muốn nó bị mất đi nên a sẽ gán giá trị của nó cho một cái biến -->
                                <div class="col-md-12 form-group">
                                    <p><a href="#" class="text-danger"><?php echo $errorRe ?></a></p>
                                    <!-- đây là nơi sẽ hiển thị ra những cái lỗi khi đăng ký của ta -->
                                    <!-- như tên tk đã bị trùng hay mấy cái vấn đề khác -->
                                    <button type="submit" value="submit" class="btn_3" name='btnRegister'>
                                        Register
                                    </button>
                                      <!-- đây là btn có type là submit nên khi click nó sẽ gửi dữ liệu thông qua form tới sever để xử lý  -->
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================login_part end =================-->

    <?php
include "footer.php"
?>
</body>

</html>
