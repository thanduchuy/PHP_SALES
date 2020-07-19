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
include "header.php";
include "control/cartControl.php";
if (!isset($_SESSION['user'])) {
    // isset là để kiểm tra biến kia đã đc khởi tạo hay chưa mà em thấy nó có dấu !
    // thì từ true sẽ thành false và ngược lại
    // kiểm tra nếu người dùng chưa đăng nhập
    // thì ta sẽ không cho người dùng mua hàng
    // và chuyển sang login bắt người dùng phải đăng nhập mới cho mua hàng
    header('Location: /sales/login.php');
}
$cart = getAllCart($_SESSION['user']);
// gọi hàm getAllCart từ cartControl.php để lấy ra các sản phẩm trong giỏ hàng của người dùng
$total = subTotalCart($cart);
// gọi hàm subTotalCart để tính được tổng số tiền trong giỏ hàng
if (isset($_GET['err'])) {
    echo "<script type='text/javascript'>alert('Vui lòng chọn Shipping');</script>";
}
// ở chổ tăng giảm số lượng sản phẩm
// ta sẽ dùng get khi ta click vào btn nó sẽ là một thẻ a
// thẻ a này sẽ liên kết đến trang cart này với đường link có hai tham số
// đường link nó sẽ có dạng như thế này : /sales/cart.php?countPlus=true&id=11
// tham số đầu tiên là kiểu để mình biết đc người dùng chọn tăng hay giảm số lượng
// tham số thứ hai là id của sản phẩm ấy trong giỏ hàng
// để ta có thể tăng giảm số lượng cho đúng sản phẩm
// bởi vì một giỏ hàng có thể có nhiều sản phẩm
// nên ta cần cái id để phân biệt giữa các sản phẩm trong giỏ hàng
if (isset($_GET['countPlus'])) {
    $id = $_GET['id'];
    // lấy ra tham số id từ url để lấy được id sản phẩm
    // chạy vòng for lặp lại qua từng sản phẩm trong giỏ hàng
    for ($i = 0; $i < count($cart); $i++) {
        if ($cart[$i]['cart_id'] == $id) {
            // sản phẩm nào có id bằng với id từ url truyền qua
            // thì ta sẽ tiến hành cập nhật số lượng của sản phẩm
            updateQuanlity($id, number_format($cart[$i]['quantity']) + 1);
            // gọi hàm này từ bên cartControl để cập nhật số lượng
            // truyền vào hai tham số
            // 1/ id sản phẩm cần chỉnh sửa
            // 2/ số lượng sản phẩm = số lượng sản phẩm hiện tại + 1
            $cart = getAllCart($_SESSION['user']);
            // sau đó tiền hành cập nhật lại giỏ hàng để nhận đc sự thay đổi
            $total = subTotalCart($cart);
            // cập nhật lại luôn tổng tiền hàng
            break;
        }
    }
} else if (isset($_GET['countMinus'])) {
    $id = $_GET['id'];
    for ($i = 0; $i < count($cart); $i++) {
        // bên này cũng tương tự như trên nhưng mà có thêm vài cái khác khác xí thui :v
        // như là khi số lượng sản phẩm đăng bằng 1 mà ta bấm giảm nữa
        // thì nó sẽ  = 0 mà bằng 0 thì xoá sản phẩm ấy trong giỏ hàng luôn :D
        // còn mà lớn hơn 1 thì nó mới giảm số lượng sản phẩm xuống 1 đơn vị
        if ($cart[$i]['cart_id'] == $id) {
            if (number_format($cart[$i]['quantity']) == 1) {
                deleteItemInCart($cart[$i]['cart_id']);
                // gọi hàm này ở bên cartControl nhận vào id sản phẩm và xoá nó đí :v
                $cart = getAllCart($_SESSION['user']);
                $total = subTotalCart($cart);
            } else {
                updateQuanlity($id, number_format($cart[$i]['quantity']) - 1);
                // gọi hàm này từ bên cartControl để cập nhật số lượng
                // truyền vào hai tham số
                // 1/ id sản phẩm cần chỉnh sửa
                // 2/ số lượng sản phẩm = số lượng sản phẩm hiện tại - 1
                $cart = getAllCart($_SESSION['user']);
                $total = subTotalCart($cart);
                break;
            }
        }
    }
}
?>
  <!-- slider Area Start-->
  <div class="slider-area ">
    <!-- Mobile Menu -->
    <div class="single-slider slider-height2 d-flex align-items-center" data-background="assets/img/hero/category.jpg">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="hero-cap text-center">
                        <h2>Card List</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>
  <!-- slider Area End-->

  <!--================Cart Area =================-->
  <section class="cart_area section_padding">
    <div class="container">
    <form method="get" action="checkout.php">
    <div class="cart_inner">
        <div class="table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">Product</th>
                <th scope="col">Price</th>
                <th scope="col">Quantity</th>
                <th scope="col">Total</th>
              </tr>
            </thead>
            <tbody>
            <!-- đây là vòng lặp để hiển thị ra các sản phẩm trong giỏ hàng -->
            <!-- nó sẽ lặp lại các hàng tr trong table của html -->
            <!-- để hiển thị ra các hàng của cái bảng cart này -->
              <?php foreach ($cart as $item) {?>
                <tr>
                <td>
                  <div class="media">
                    <div class="d-flex">
                    <!-- mỗi lần lặp nó sẽ gán giá trị cho cái biến $item  -->
                    <!-- theo mỗi phần tử trong mảng $cart của ta để hiển thị ra sản phẩm -->
                      <img src=<?php echo $item['image'] ?> alt="" />
                    <!-- item[image] sẽ trả về cho ta đường dẫn của cái hình sản phẩm -->
                    </div>
                    <div class="media-body">
                      <p><?php echo $item['name'] ?></p>
                      <!-- item[name] sẽ trả về cho ta tên  sản phẩm -->
                    </div>
                  </div>
                </td>
                <td>
                  <h5>$<?php echo $item['price'] ?></h5>
                   <!-- item[price] sẽ trả về cho ta giá sản phẩm -->
                </td>
                <td>
                  <div class="product_count">
                    <!-- <input type="text" value="1" min="0" max="10" title="Quantity:"
                      class="input-text qty input-number" />
                    <button
                      class="increase input-number-increment items-count" type="button">
                      <i class="ti-angle-up"></i>
                    </button>
                    <button
                      class="reduced input-number-decrement items-count" type="button">
                      <i class="ti-angle-down"></i>
                    </button> -->
                    <a href="cart.php?countMinus=true&id=<?php echo $item['cart_id'] ?>" style="color:black;">
                    <span class="input-number-decrement"> <i class="ti-minus"></i></span>
                    </a>
                    <input class="input-number" type="text" value=<?php echo $item['quantity'] ?> disabled>
                    <a href="cart.php?countPlus=true&id=<?php echo $item['cart_id'] ?>" style="color:black;">
                    <span class="input-number-increment"> <i class="ti-plus"></i></span>
                    </a>
                     <!-- đây là chính là nút tăng giảm số lượng của sản phẩm  -->
                  </div>
                </td>
                <td>
                  <h5>$<?php echo (number_format($item['quantity']) * number_format($item['price'])) ?></h5>
                   <!-- hiển thị tổng tiền của sản phẩm   -->
                    <!-- số lượng sản phẩm * giá sản phẩm  -->
                </td>
              </tr>
              <?php }?>
              <tr>
                <td></td>
                <td></td>
                <td>
                  <h5>Subtotal</h5>
                </td>
                <td>
                  <h5>$<?php echo $total ?></h5>
                   <!-- hiển thị ra tổng tiền của giỏ hàng của người dùng  -->
                </td>
              </tr>
              <tr class="shipping_area">
                <td></td>
                <td></td>
                <td>
                  <h5>Shipping</h5>
                </td>
                <td>
                  <div class="shipping_box">
                    <ul class="list">
                      <li>
                        Flat Rate: $5.00
                        <input type="radio" name="radio" value="5" aria-label="Radio button for following text input">
                      </li>
                      <li>
                        Free Shipping
                        <input type="radio" name="radio" value="0" aria-label="Radio button for following text input">
                      </li>
                      <li>
                        Flat Rate: $10.00
                        <input type="radio" name="radio" value="10" aria-label="Radio button for following text input">
                      </li>
                      <li class="active">
                        Local Delivery: $2.00
                        <input type="radio" name="radio" value="2" aria-label="Radio button for following text input">
                      </li>
                    </ul>
                  </div>
                </td>
              </tr>
            </tbody>
          </table>
          <div class="checkout_btn_inner float-right">
            <a class="btn_1" href="index.php">Continue Shopping</a>
            <button class="btn_1 checkout_btn_1" type="submit" name="Result" value="true">Proceed to checkout</button>
          </div>
        </div>
      </div>
    </form>
  </section>
  <?php
include "footer.php"
?>
</body>

</html>