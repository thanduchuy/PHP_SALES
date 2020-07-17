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
include "header.php";
include "control/loginControl.php";
loginAccount();
ob_end_flush();
?>

    <!-- slider Area Start-->
    <div class="slider-area ">
        <!-- Mobile Menu -->
        <div class="single-slider slider-height2 d-flex align-items-center" data-background="assets/img/hero/category.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="hero-cap text-center">
                            <h2>Login</h2>
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
                            <a href="register.php" class="btn_3">Create an Account</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="login_part_form">
                        <div class="login_part_form_iner">
                            <h3>Welcome Back ! <br>
                                Please Sign in now</h3>
                                <!-- đây chính là form đăng nhập của ta -->
                                <!-- action # nghĩa là nó sẽ gửi form dữ liệu đến cái trang hiện tại chính là login.php-->
                            <form class="row contact_form" action="#" method="post" novalidate="novalidate">
                                <div class="col-md-12 form-group p_star">
                                    <input type="text" class="form-control" id="name" name="nameLg" value="<?php echo $nameLg ?>"
                                        placeholder="Username">
                                        <!-- input của cái tên đăng nhập  -->
                                        <!-- nó có value là một cái biến ta tạo ra để lưu lại giá trị  -->
                                        <!-- khi ta submit form thì sẽ không bị mất giá trị của input -->
                                </div>
                                <div class="col-md-12 form-group p_star">
                                    <input type="password" class="form-control" id="password" name="passwordLg" value="<?php echo $passLg ?>"
                                        placeholder="Password">
                                        <!-- input mật khẩu của người dùng -->
                                        <!-- Nó cũng sẽ được lưu giá trị khi ta bị lỗi như sai tên tk thì submit
                                        nó sẽ không khiến ta bị mất dữ liệu đã nhập -->
                                </div>
                                <div class="col-md-12 form-group">
                                    <div class="creat_account d-flex align-items-center">
                                        <input type="checkbox" id="f-option" name="selector">
                                        <label for="f-option">Remember me</label>
                                    </div>
                                    <p><a href="#" class="text-danger"><?php echo $errorLg ?></a></p>
                                    <!-- Hiển thị những lỗi có thể xảy ra khi ta đăng nhập -->
                                    <!-- Cho người dùng thấy -->
                                    <button type="submit" value="submit" class="btn_3" name="btnLogin">
                                        log in
                                    </button>
                                    <!-- button submit để tiến hành đăng nhập vào trang của ta -->
                                    <!-- nó sẽ gửi tên đăng nhập và mật khẩu và ta sẽ dùng loginControl.php để ta có thể kiểm tra đăng nhập -->
                                    <a class="lost_pass" href="#">forget password?</a>
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
