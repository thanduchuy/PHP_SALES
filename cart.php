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

$cart = getAllCart($_SESSION['user']);
$total = subTotalCart($cart);
if (isset($_GET['err'])) {
    echo "<script type='text/javascript'>alert('Vui lòng chọn Shipping');</script>";
}
if (isset($_GET['countPlus'])) {
    $id = $_GET['id'];
    for ($i = 0; $i < count($cart); $i++) {
        if ($cart[$i]['cart_id'] == $id) {
            updateQuanlity($id, number_format($cart[$i]['quantity']) + 1);
            $cart = getAllCart($_SESSION['user']);
            $total = subTotalCart($cart);
            break;
        }
    }
} else if (isset($_GET['countMinus'])) {
    $id = $_GET['id'];
    for ($i = 0; $i < count($cart); $i++) {
        if ($cart[$i]['cart_id'] == $id) {
            if (number_format($cart[$i]['quantity']) == 1) {
                deleteItemInCart($cart[$i]['cart_id']);
                $cart = getAllCart($_SESSION['user']);
                $total = subTotalCart($cart);
            } else {
                updateQuanlity($id, number_format($cart[$i]['quantity']) - 1);
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
              <?php foreach ($cart as $item) {?>
                <tr>
                <td>
                  <div class="media">
                    <div class="d-flex">
                      <img src=<?php echo $item['image'] ?> alt="" />
                    </div>
                    <div class="media-body">
                      <p><?php echo $item['name'] ?></p>
                    </div>
                  </div>
                </td>
                <td>
                  <h5>$<?php echo $item['price'] ?></h5>
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

                  </div>
                </td>
                <td>
                  <h5>$<?php echo (number_format($item['quantity']) * number_format($item['price'])) ?></h5>
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