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
include "control/productControl.php";
$idProduct = $_GET['idProduct'];
$data = getSingleProduct($idProduct);
$count = number_format($_GET['count']);
if (isset($_GET['countPlus'])) {
    $count += 1;
} else if (isset($_GET['countMinus'])) {
    $count -= 1;
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
                            <h2>product Details</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- slider Area End-->

  <!--================Single Product Area =================-->
  <div class="product_image_area">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-12">
          <div class="product_img_slide owl-carousel">
            <div class="single_product_img">
              <img src=<?php echo $data['image'] ?> alt="#" class="img-fluid">
            </div>
            <div class="single_product_img">
              <img src=<?php echo $data['image'] ?> alt="#" class="img-fluid">
            </div>
            <div class="single_product_img">
              <img src=<?php echo $data['image'] ?> alt="#" class="img-fluid">
            </div>
          </div>
        </div>
        <div class="col-lg-8">
          <div class="single_product_text text-center">
            <h3><?php echo $data['name'] ?></h3>
            <p>
            <?php echo $data['content'] ?>
            </p>
            <div class="card_area">
                <div class="product_count_area">
                    <p>Quantity</p>
                    <div class="product_count d-inline-block">
                    <span class="product_count_item inumber-decrement">
                    <a href='single-product.php?idProduct=<?php echo $idProduct ?>&countMinus=true&count=<?php echo $count ?>' style="color:black;" ><i class="ti-minus"></i></a>
                    </span>
                        <input class="product_count_item input-number" type="text" value=<?php echo $count ?> min="1" max="10">
                    <a href='single-product.php?idProduct=<?php echo $idProduct ?>&countPlus=true&count=<?php echo $count ?>' style="color:black;" ><span class="product_count_item number-increment"> <i class="ti-plus"></i></span></a>
                    </div>
                    <p>$<?php echo ($data['price'] * $count) ?></p>
                </div>
              <div class="add_to_cart">
                  <a href="control/addProduct.php?quanlity=<?php echo $count ?>&price=<?php echo $data['price'] ?>&image=<?php echo $data['image'] ?>&idP=<?php echo $data['product_id'] ?>&name=<?php echo $data['name'] ?>" class="btn_3">
                  add to cart
                  </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--================End Single Product Area =================-->
   <!-- subscribe part here -->
   <section class="subscribe_part section_padding">
      <div class="container">
          <div class="row justify-content-center">
              <div class="col-lg-8">
                  <div class="subscribe_part_content">
                      <h2>Get promotions & updates!</h2>
                      <p>Seamlessly empower fully researched growth strategies and interoperable internal or “organic” sources credibly innovate granular internal .</p>
                      <div class="subscribe_form">
                          <input type="email" placeholder="Enter your mail">
                          <a href="#" class="btn_1">Subscribe</a>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </section>
    <?php
include "footer.php"
?>


</body>

</html>