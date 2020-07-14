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
// đây là trang hiển thị thông tin sản phẩm
// mỗi lần mấy em click vào một sản phẩm từ trang index nó sẽ chuyển qua trang này
// đường link nó sẽ có dạng như sau : http://localhost:8080/sales/single-product.php?idProduct=13&count=1
// giờ ở trong web nó sẽ có hai dạng truyền,gửi dữ liệu chính đó là GET và POST
// ở trang này a sẽ dùng cái GET nó sẽ gửi và nhận dữ liệu ta thông qua các parameter của đường dẫn
//  $_GET là một biến toàn cục trong php ta có thể thoải mái gọi ra
// $_GET kiểu dữ liệu của nó sẽ là một mảng
// nhìn trên đường dẫn a ví dụ ở trên thì mấy em có thể thấy có hai tham số
// nên $_GET của ta sẽ là một cái mảng chứa giá trị của hai tham số trên
$idProduct = $_GET['idProduct']; // sẽ trả về cho a cái mã sản phẩm
$data = getSingleProduct($idProduct);
// anh sẽ gọi hàm getSingleProduct này từ bên cái productControl
// nó sẽ trả về cho a cái sản phẩm theo cái idProduct a ms nhận đc từ $_GET
$count = number_format($_GET['count']);
// sẽ trả về cho a cái số lượng sản phẩm a muốn mua mặc định ban đầu sẽ là 1
if (isset($_GET['countPlus'])) {
    $count += 1;
} else if (isset($_GET['countMinus'])) {
    $count -= 1;
}
// đây là nơi ta sẽ nhận đường link từ cái single product để xem mình đang tăng hay giảm sản phẩm
// đường link này sẽ từ hai cái thẻ a (-) và (+) ở dưới
// ở đây a dùng insset nó sẽ kiểm tra cái giá trị của a đã được khởi tạo hay chưa nó sẽ trả về true hoặc false
// nếu cái đường dẫn có tham số countPlus thì nghĩa là mình đang muốn tăng số lượng
// nó sẽ lấy số lượng hiện tại và cộng cho 1
// nếu cái đường dẫn có tham số countMinus thì nghĩa là mình đang muốn giảm số lượng
// nó sẽ lấy số lượng hiện tại và trừ cho 1
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
          <!-- cái sản phẩm mà a có được từ hàm getSingleProduct a đã lưu nó vào biến tên  data   -->
            <!-- hiển thị hình ảnh của sản phẩm -->
            <div class="single_product_img">
             <!-- khi anh echo cái data[image] nó sẽ trã về đường dẫn của sản phẩm ấy -->
              <img src=<?php echo $data['image'] ?> alt="#" class="img-fluid">
            </div>
            <div class="single_product_img">
              <img src=<?php echo $data['image'] ?> alt="#" class="img-fluid">
            </div>
            <div class="single_product_img">
              <img src=<?php echo $data['image'] ?> alt="#" class="img-fluid">
            </div>
            <!-- vì cái trang ni cần có ba cái hình nên a phải truyền vào ba lần  -->
          </div>
        </div>
        <div class="col-lg-8">
          <div class="single_product_text text-center">
            <h3><?php echo $data['name'] ?></h3>
            <!-- hiển thị tên của sản phẩm -->
            <p>
            <?php echo $data['content'] ?>
             <!-- hiển thị mô tả của sản phẩm -->
            </p>
            <div class="card_area">
                <div class="product_count_area">
                    <p>Quantity</p>
                    <div class="product_count d-inline-block">
                    <span class="product_count_item inumber-decrement">
                    <!-- đây là chổ tăng hoặc giảm số lượng sản phẩm -->
                    <!-- nó sẽ gửi lại một đường dẫn tới trang single-product này -->
                    <!-- và sử dụng $_GET để có thể biết ta đang tăng hay giảm số lượng -->
                    <a href='single-product.php?idProduct=<?php echo $idProduct ?>&countMinus=true&count=<?php echo $count ?>' style="color:black;" ><i class="ti-minus"></i></a>
                     <!-- đây là cái thẻ link để giảm số luợng sản phẩm -->
                     <!-- đường dẫn nó sẽ có 3 tham số  -->
                     <!-- 1/ mã sản phẩm (idProduct)   -->
                     <!-- 2/ là cái tham số để cho ta biết mình đang muốn giảm sản phẩm (countMinus)   -->
                     <!-- 3/ số lượng sản phẩm hiện tại (count)    -->
                    </span>
                        <input class="product_count_item input-number" type="text" value=<?php echo $count ?> min="1" max="10">
                         <!-- hiển thị số lượng sản phẩm với điều kiện là nhỏ nhất là 1 sản phẩm lớn nhất là 10 sản phẩm   -->
                    <a href='single-product.php?idProduct=<?php echo $idProduct ?>&countPlus=true&count=<?php echo $count ?>' style="color:black;" ><span class="product_count_item number-increment"> <i class="ti-plus"></i></span></a>
                      <!-- đây là cái thẻ link để tăng số luợng sản phẩm -->
                     <!-- đường dẫn nó sẽ có 3 tham số  -->
                     <!-- 1/ mã sản phẩm (idProduct)   -->
                     <!-- 2/ là cái tham số để cho ta biết mình đang muốn tăng sản phẩm (countPlus)   -->
                     <!-- 3/ số lượng sản phẩm hiện tại (count)    -->
                    </div>
                    <p>$<?php echo ($data['price'] * $count) ?></p>
                    <!-- hiển thị giá cuối cùng của sản phẩm = giá sản phẩm * số lượng sản phẩm   -->
                </div>
              <div class="add_to_cart">
                  <a href="control/addProduct.php?quanlity=<?php echo $count ?>&price=<?php echo $data['price'] ?>&image=<?php echo $data['image'] ?>&idP=<?php echo $data['product_id'] ?>&name=<?php echo $data['name'] ?>" class="btn_3">
                  add to cart
                  </a>
                  <!-- chuyển sang trang add product để thêm sản phẩm   -->
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