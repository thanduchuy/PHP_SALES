<!doctype html>
<html lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>eCommerce HTML-5 Template </title>
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
include "control/cartControl.php";
// khi ở bên trang cart sau khi kiểm tra kĩ càng sản phẩm trong giỏ hàng
// và chọn hình thức shipping ta muốn
// thì nó sẽ chuyển qua trang này checkout để tiền hành xác nhận lần cuối
// và thêm những thông tin cần thiết cho việc giao hàng và mua hàng
$cart = getAllCart($_SESSION['user']);
// cái này là để lấy ra tất cả sản phẩm trong giỏ hàng để kiểm tra lần cuối cùng
$total = subTotalCart($cart);
// cũng lấy ra luôn tổng tiền trong giỏ hàng để kiểm tra
if (isset($_GET['Result']) && isset($_GET['radio'])) {
    $radioVal = $_GET["radio"];
    // cái này là để kiểm tra xem người dùng đã chọn hình thức shipping hay chưa
    // nếu chưa thì ta sẽ quay ngược lại trang cart để thông báo cho người dùng biết
} else {
    header('Location:cart.php?err=true');
}
checkOut($cart);
// rồi ta qua trang cartControl để xem hàm này làm gì nhé :)
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
                        <h2>Checkout</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>
  <!-- slider Area End-->

  <!--================Checkout Area =================-->
  <section class="checkout_area section_padding">
    <div class="container">
      <div class="billing_details">
        <form method="post">
         <!-- form này sẽ có method là post nên nó sẽ gửi dữ liệu thông qua form -->
         <!-- ở trong form này ở các thẻ input em để ý có cái atribute là name -->
          <!-- nó dùng để phân biệt lẫn nhau các phần tử từ form gửi vô sever cho ta -->
           <!-- khi ta cần lấy dữ liệu cái input nào thì ta chỉ cần gọi đúng cái name của nó thì nó sẽ trả về cho ta nội dung của thẻ input ấy -->
        <div class="row">
          <div class="col-lg-8">
            <h3>Chi tiết thanh toán</h3>
            <div class="row contact_form" action="#" method="post" novalidate="novalidate">
              <div class="col-md-6 form-group p_star">
                <input type="text" class="form-control" id="first" name="firstName" placeholder="First name"/>
              </div>
              <div class="col-md-6 form-group p_star">
                <input type="text" class="form-control" id="last" name="lastName" placeholder="Last name"/>
              </div>
              <div class="col-md-12 form-group">
                <input type="text" class="form-control" id="company" name="company" placeholder="Company name" />
              </div>
              <div class="col-md-6 form-group p_star">
                <input type="text" class="form-control" id="number" name="number" placeholder="Phone number"/>
              </div>
              <div class="col-md-6 form-group p_star">
                <input type="text" class="form-control" id="email" name="email"placeholder="Email Address"/>
              </div>
              <div class="col-md-12 form-group p_star">
                <select class="country_select" name="selectOption">
                  <option value="VN">Việt Nam</option>
                  <option value="USA">Mỹ</option>
                  <option value="JP">Nhật Bản</option>
                </select>
              </div>

              <div class="col-md-12 form-group p_star">
                <input type="text" class="form-control" id="city" name="city" placeholder="Town/City"/>
              </div>
              <div class="col-md-12 form-group p_star">
                <input type="text" class="form-control" id="district" name="district" placeholder="District"/>
              </div>
              <div class="col-md-12 form-group">
                <input type="text" class="form-control" id="zip" name="street" placeholder="Street" />
               </div>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="order_box">
              <h2>Your Order</h2>
              <ul class="list">
                <li>
                  <a href="#">Product
                    <span>Total</span>
                  </a>
                </li>
                <?php foreach ($cart as $item) {?>
                <!-- vòng for này để hiển thị lại các sản phẩm trong giỏ hàng -->
                <!-- cho người dùng kiểm tra lại lần cuối  -->
                <li>
                  <a href="#"><?php echo $item['name'] ?>
                    <span class="middle">x<?php echo $item['quantity'] ?></span>
                    <span class="last">$<?php echo (number_format($item['quantity']) * number_format($item['price'])) ?></span>
                  </a>
                </li>
                <?php }?>
              </ul>
              <ul class="list list_2">
                <li>
                  <a href="#">Subtotal
                    <span >$<?php echo $total ?></span>
                     <!-- hiển thị tổng tiền cần thanh toán trong giỏ hàng -->
                    <input name="subtotal" value=<?php echo $total ?> hidden/>
                  </a>
                </li>
                <li>
                  <a href="#">Shipping
                  <!-- hiển thị tổng tiền của các sản phẩm trong giỏ hàng  -->
                    <span name='shipping'>Flat rate: $<?php echo $radioVal ?></span>
                    <input name="shipping" value=<?php echo $radioVal ?> hidden/>
                  </a>
                </li>
                <li>
                  <a href="#">Total
                   <!-- hiển thị tổng tiền cần thanh toán trong giỏ hàng -->
                    <!-- tổng tiền sản phẩm + phí ship -->
                    <span>$<?php echo $total + number_format($radioVal) ?></span>
                  </a>
                </li>
              </ul>
              <div class="payment_item">
                <div class="radion_btn">
                  <input type="radio" id="f-option5" name="selector" value='payment'/>
                  <label for="f-option5">Check payments</label>
                  <div class="check"></div>
                </div>
                <p>
                Vui lòng gửi séc đến Tên Cửa hàng, Phố Cửa hàng, Cửa hàng Thị trấn, Cửa hàng Bang / Quận, Mã bưu điện.
                </p>
              </div>
              <div class="payment_item active">
                <div class="radion_btn">
                  <input type="radio" id="f-option6" name="selector" value='paypal'/>
                  <label for="f-option6">Paypal </label>
                  <img src="img/product/single-product/card.jpg" alt="" />
                  <div class="check"></div>
                </div>
                <p>
                Vui lòng gửi séc đến Tên Cửa hàng, Phố Cửa hàng, Cửa hàng Thị trấn, Cửa hàng Bang / Quận, Mã bưu điện.
                </p>
              </div>
              <div class="creat_account">
                <input type="checkbox" id="f-option4" name="rule" />
                <label for="f-option4">I’ve read and accept the </label>
                <a href="#">terms & conditions*</a>
              </div>
              <button class="btn_3" type='submit' name='btnCheckout'>Thanh toán ngay</button>
            </div>
          </div>
        </div>
        </form>
      </div>
    </div>
  </section>
  <!--================End Checkout Area =================-->
  <?php
include "footer.php"
?>
</body>

</html>