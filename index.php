<!doctype html>
<html class="no-js" lang="zxx">
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
include "header.php";
include "control/productControl.php";
$productAll = getLastetAll(); // lấy ra ngẫu nhiên 6 sản phẩm
$productNew = getLastetNew(); // lấy ra các sản phẩm có catagori là new
$productFeatured = getLastetFeatured(); // lấy ra các sản phẩm có catagori là featured
$productOffer = getLastetOffer(); // lấy ra các sản phẩm có catagori là offer
// tao ra 4 cai bien de chua du lieu tra ve cua bon cai ham
// tu trang productControl.php
$arrays = [$productAll, $productNew, $productFeatured, $productOffer];
// anh se add 4 cai bien ay vao trong cai arrays de de dang quan ly
// array nay se co 4 phan tu
// ma phan tu nay se co doi tuong lastest
// moi cai lastest nay se co tab id la khac nhau ...
if (isset($_GET['success'])) {
    echo "<script type='text/javascript'>alert('Đặt hàng thành công');</script>";
}
?>
    <main>

        <!-- slider Area Start -->
        <div class="slider-area ">
            <!-- Mobile Menu -->
            <div class="slider-active">
                <div class="single-slider slider-height" data-background="assets/img/hero/h1_hero.jpg">
                    <div class="container">
                        <div class="row d-flex align-items-center justify-content-between">
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 d-none d-md-block">
                                <div class="hero__img" data-animation="bounceIn" data-delay=".4s">
                                    <img src="assets/img/hero/hero_man.png" alt="">
                                </div>
                            </div>
                            <div class="col-xl-5 col-lg-5 col-md-5 col-sm-8">
                                <div class="hero__caption">
                                    <span data-animation="fadeInRight" data-delay=".4s">60% Discount</span>
                                    <h1 data-animation="fadeInRight" data-delay=".6s">Winter <br> Collection</h1>
                                    <p data-animation="fadeInRight" data-delay=".8s">Best Cloth Collection By 2020!</p>
                                    <!-- Hero-btn -->
                                    <div class="hero__btn" data-animation="fadeInRight" data-delay="1s">
                                        <a href="industries.html" class="btn hero-btn">Shop Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="single-slider slider-height" data-background="assets/img/hero/h1_hero.jpg">
                    <div class="container">
                        <div class="row d-flex align-items-center justify-content-between">
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 d-none d-md-block">
                                <div class="hero__img" data-animation="bounceIn" data-delay=".4s">
                                    <img src="assets/img/hero/hero_man.png" alt="">
                                </div>
                            </div>
                            <div class="col-xl-5 col-lg-5 col-md-5 col-sm-8">
                                <div class="hero__caption">
                                    <span data-animation="fadeInRight" data-delay=".4s">60% Discount</span>
                                    <h1 data-animation="fadeInRight" data-delay=".6s">Winter <br> Collection</h1>
                                    <p data-animation="fadeInRight" data-delay=".8s">Best Cloth Collection By 2020!</p>
                                    <!-- Hero-btn -->
                                    <div class="hero__btn" data-animation="fadeInRight" data-delay="1s">
                                        <a href="industries.html" class="btn hero-btn">Shop Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- slider Area End-->
        <!-- Category Area Start-->
        <section class="category-area section-padding30">
            <div class="container-fluid">
                <!-- Section Tittle -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-tittle text-center mb-85">
                            <h2>Shop by Category</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-4 col-lg-6">
                        <div class="single-category mb-30">
                            <div class="category-img">
                                <img src="assets/img/categori/cat1.jpg" alt="">
                                <div class="category-caption">
                                    <h2>Owmen`s</h2>
                                    <span class="best"><a href="#">Best New Deals</a></span>
                                    <span class="collection">New Collection</span>
                                </div>
                            </div>
                        </div>
                    </div>
                     <div class="col-xl-4 col-lg-6">
                        <div class="single-category mb-30">
                            <div class="category-img text-center">
                                <img src="assets/img/categori/cat2.jpg" alt="">
                                <div class="category-caption">
                                    <span class="collection">Discount!</span>
                                    <h2>Winter Cloth</h2>
                                   <p>New Collection</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-6">
                        <div class="single-category mb-30">
                            <div class="category-img">
                                <img src="assets/img/categori/cat3.jpg" alt="">
                                <div class="category-caption">
                                    <h2>Man`s Cloth</h2>
                                    <span class="best"><a href="#">Best New Deals</a></span>
                                    <span class="collection">New Collection</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Category Area End-->
        <!-- Latest Products Start -->
        <section class="latest-product-area padding-bottom">
            <div class="container">
                <div class="row product-btn d-flex justify-content-end align-items-end">
                    <!-- Section Tittle -->
                    <div class="col-xl-4 col-lg-5 col-md-5">
                        <div class="section-tittle mb-30">
                            <h2>Latest Products</h2>
                        </div>
                    </div>
                    <div class="col-xl-8 col-lg-7 col-md-7">
                        <div class="properties__button f-right">
                            <!--Nav Button  -->
                            <nav>
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">All</a>
                                    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">New</a>
                                    <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Featured</a>
                                    <a class="nav-item nav-link" id="nav-last-tab" data-toggle="tab" href="#nav-last" role="tab" aria-controls="nav-contact" aria-selected="false">Offer</a>
                                </div>
                            </nav>
                            <!--End Nav Button  -->
                        </div>
                    </div>
                </div>
                <!-- Nav Card -->
                <div class="tab-content" id="nav-tabContent">
                <!-- foreach vong lap sau moi lan lap no se gan mot gia tri cho cai bien -->
                <!-- cai dau tien no se la cai array ma em muon lap -->
                <!-- cai ma dung sau thang as la cai bien  -->
                <!-- foreach ($tenMang as $tenBien) {} -->
                <?php foreach ($arrays as $lastet) {?>
                    <!-- $tenBien -> tenPhanTu  no tuong tu cau truc $tenBien['$tenPhanTu']  -->
                    <!-- toan tu ba ngoi la  -->
                    <!-- dieu kien ? "truong hop true" : "truong hop false" -->
                    <div class="tab-pane fade <?php echo $lastet->tab == "nav-home" ? 'show active' : '' ?>" id=<?php echo $lastet->tab; ?> role="tabpanel" aria-labelledby="<?php echo $lastet->tab ?>-tab">
                     <!-- cai phan tu tab cua lastet cua a no se tra ve cho a cai nav id -->
                    <!-- còn cái data của a nó sẽ trả về cho a cái array -->
                        <div class="row">
                        <?php foreach ($lastet->data as $data) {?>
                    <!-- cái array này nó sẽ bao gồm là một cái array có dạng là Mảng kết hợp - Associative Arrays  -->
                    <!-- cái key của nó sẽ ko có dạng là index là 0,1,2,3... nữa mà nó sẽ là một cái string -->
                            <a href="single-product.php?idProduct=<?php echo $data['product_id'] ?>&count=1">
                             <!-- đoạn này là tạo một cái đường dẫn để chuyển qua trang thông tin sản phẩm   -->
                             <!-- echo nó sẽ in ra giá trị của một biến nào đó ra màn hình  -->
                             <!-- nên khi a  echo $data['product_id'] nó sẽ trả về cho a là cái product id sẽ là một số nào đó là id của sản phẩm -->
                            <div class="col-xl-4 col-lg-4 col-md-6">
                                <div class="single-product mb-60">
                                    <div class="product-img">
                                        <img src=<?php echo $data['image'] ?> alt="">
                                        <!-- echo ở chỗ này nó sẽ in ra cho mình cái đường dẫn hình ảnh để mình có thể hiển thị đc -->
                                        <!-- đường dẫn này là từ bên mysql a insert vào nó sẽ có dạng: assets/img/categori/product17.png  -->
                                        <!-- là một cái đường dẫn -->
                                        <div class="new-product">
                                            <span><?php echo $data['catagori_name'] ?></span>
                                            <!-- còn chổ này nó sẽ là in ra cái name của catagori sẽ là features,new hoặc là offer  -->
                                            <!-- là cái tab màu đỏ mấy em thấy trên mỗi cái hình ấy  -->
                                        </div>
                                    </div>
                                    <div class="product-caption">
                                        <div class="product-ratting">
                                        <!-- còn đây là một cái vòng lặp a dùng để in ra mấy cái ngôi sao  -->
                                        <!-- để hiển thị đánh giá của sản phẩm  -->
                                        <!-- vòng lặp này sẽ chạy từ 1 đến 5 vì đánh giá sản phẩm của mình là nhỏ nhất là 1 sao nhiều nhất là 5 sao  -->
                                        <?php for ($i = 1; $i <= 5; $i++) {?>
                                        <!-- đoạn dưới này là một câu lệnh điều kiện if else -->
                                            <!-- data[rate] ở đây nó sẽ trả về là các số từ 1 đến 5  -->
                                            <!-- nếu cái i đang nhỏ hơn cái data[rate] thì nó sẽ trả về true  và ngược lại nếu lớn hơn sẽ trả về false-->
                                            <?php if ($i <= number_format($data['rate'])) {?>
                                             <!-- đây là cái trường hợp đúng -->
                                                <i class="far fa-star"></i> <!-- hiển thị ra màn hình ngôi sao màu vàng  -->
                                            <?php } else {?>
                                            <!-- đây là cái trường hợp sai -->
                                                <i class="far fa-star low-star"></i> <!-- hiển thị ra màn hình ngôi sao màu xám xám  -->
                                            <?php }?>
                                        <?php }?>
                                        <!-- ví dụ data[rate] của a là bằng 3 -->
                                        <!-- thì khi vòng lặp chạy từ 1 đến 5 nó sẽ có các số 1,2,3 là nhỏ hơn và bằng 3 -->
                                        <!-- nên nó sẽ có 3 ngôi sao màu vàng -->
                                        <!-- còn các số 4-5 là lớn hơn 3 nên nó sẽ hiển thị ngôi sao màu xám xám -->
                                        </div>
                                        <h4><a href="#"><?php echo $data['name'] ?></a></h4>
                                        <!-- còn đây là chỗ nó sẽ hiển thị ra cái tên của sản phẩm -->
                                        <div class="price">
                                            <ul>
                                                <li>$<?php echo $data['price'] ?></li>
                                                    <!-- còn đây là chỗ nó sẽ hiển thị ra cái giá của sản phẩm -->
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </a>
                            <?php }?>
                         <!-- xong đoạn này là chúng ta đã xong trong việc -->
                          <!-- hiển thị các sản phẩm của một cái tab của mấy em  -->
                        </div>
                    </div>
                <?php }?>
                 <!-- lặp lại các bước trên và có đc 4 tab do độ dài của array là 4 -->
                 <!-- kết thúc cái này là chúng ta sẽ có số lượng tab bằng vs số lượng của array -->
                 <!-- thế là ta đã xong trong việc hiển thị các sản phẩm trong tab và có thể chuyển đc tab qua lại trong trang index của ta -->
                  <!-- a mong đọc xong mấy cái trên này mấy em không hiểu đc hết cũng sẽ hiểu đc tầm 50% -->
                   <!-- hihi fighting :)   -->
                </div>
                <!-- End Nav Card -->
            </div>
        </section>
        <!-- Latest Products End -->
        <!-- Best Product Start -->
        <div class="best-product-area lf-padding" >
           <div class="product-wrapper bg-height" style="background-image: url('assets/img/categori/card.png')">
                <div class="container position-relative">
                    <div class="row justify-content-between align-items-end">
                        <div class="product-man position-absolute  d-none d-lg-block">
                            <img src="assets/img/categori/card-man.png" alt="">
                        </div>
                        <div class="col-xl-2 col-lg-2 col-md-2 d-none d-lg-block">
                            <div class="vertical-text">
                                <span>Manz</span>
                            </div>
                        </div>
                        <div class="col-xl-8 col-lg-8">
                            <div class="best-product-caption">
                                <h2>Find The Best Product<br> from Our Shop</h2>
                                <p>Designers who are interesten creating state ofthe.</p>
                                <a href="#" class="black-btn">Shop Now</a>
                            </div>
                        </div>
                    </div>
                </div>
           </div>
           <!-- Shape -->
           <div class="shape bounce-animate d-none d-md-block">
               <img src="assets/img/categori/card-shape.png" alt="">
           </div>
        </div>
        <!-- Best Product End-->
        <!-- Best Collection Start -->
        <div class="best-collection-area section-padding2">
            <div class="container">
                <div class="row d-flex justify-content-between align-items-end">
                    <!-- Left content -->
                    <div class="col-xl-4 col-lg-4 col-md-6">
                        <div class="best-left-cap">
                            <h2>Best Collection of This Month</h2>
                            <p>Designers who are interesten crea.</p>
                            <a href="#" class="btn shop1-btn">Shop Now</a>
                        </div>
                        <div class="best-left-img mb-30 d-none d-sm-block">
                            <img src="assets/img/collection/collection1.png" alt="">
                        </div>
                    </div>
                    <!-- Mid Img -->
                     <div class="col-xl-2 col-lg-2 d-none d-lg-block">
                        <div class="best-mid-img mb-30 ">
                            <img src="assets/img/collection/collection2.png" alt="">
                        </div>
                    </div>
                    <!-- Riht Caption -->
                    <div class="col-xl-4 col-lg-6 col-md-6">
                        <div class="best-right-cap ">
                           <div class="best-single mb-30">
                               <div class="single-cap">
                                   <h4>Menz Winter<br> Jacket</h4>
                               </div>
                               <div class="single-img">
                                  <img src="assets/img/collection/collection3.png" alt="">
                               </div>
                           </div>
                        </div>
                        <div class="best-right-cap">
                           <div class="best-single mb-30">
                               <div class="single-cap active">
                                   <h4>Menz Winter<br>Jacket</h4>
                               </div>
                               <div class="single-img">
                                  <img src="assets/img/collection/collection4.png" alt="">
                               </div>
                           </div>
                        </div>
                        <div class="best-right-cap">
                           <div class="best-single mb-30">
                               <div class="single-cap">
                                   <h4>Menz Winter<br> Jacket</h4>
                               </div>
                               <div class="single-img">
                                  <img src="assets/img/collection/collection5.png" alt="">
                               </div>
                           </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Best Collection End -->
        <!-- Latest Offers Start -->
        <div class="latest-wrapper lf-padding">
            <div class="latest-area latest-height d-flex align-items-center" data-background="assets/img/collection/latest-offer.png">
                <div class="container">
                    <div class="row d-flex align-items-center">
                        <div class="col-xl-5 col-lg-5 col-md-6 offset-xl-1 offset-lg-1">
                            <div class="latest-caption">
                                <h2>Get Our<br>Latest Offers News</h2>
                                <p>Subscribe news latter</p>
                            </div>
                        </div>
                         <div class="col-xl-5 col-lg-5 col-md-6 ">
                            <div class="latest-subscribe">
                                <form action="#">
                                    <input type="email" placeholder="Your email here">
                                    <button>Shop Now</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- man Shape -->
                <div class="man-shape">
                    <img src="assets/img/collection/latest-man.png" alt="">
                </div>
            </div>
        </div>
        <!-- Latest Offers End -->
        <!-- Shop Method Start-->
        <div class="shop-method-area section-padding30">
            <div class="container">
                <div class="row d-flex justify-content-between">
                    <div class="col-xl-3 col-lg-3 col-md-6">
                        <div class="single-method mb-40">
                            <i class="ti-package"></i>
                            <h6>Free Shipping Method</h6>
                            <p>aorem ixpsacdolor sit ameasecur adipisicing elitsf edasd.</p>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-6">
                        <div class="single-method mb-40">
                            <i class="ti-unlock"></i>
                            <h6>Secure Payment System</h6>
                            <p>aorem ixpsacdolor sit ameasecur adipisicing elitsf edasd.</p>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-6">
                        <div class="single-method mb-40">
                            <i class="ti-reload"></i>
                            <h6>Secure Payment System</h6>
                            <p>aorem ixpsacdolor sit ameasecur adipisicing elitsf edasd.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Shop Method End-->
        <!-- Gallery Start-->
        <div class="gallery-wrapper lf-padding">
            <div class="gallery-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="gallery-items">
                            <img src="assets/img/gallery/gallery1.jpg" alt="">
                        </div>
                        <div class="gallery-items">
                            <img src="assets/img/gallery/gallery2.jpg" alt="">
                        </div>
                        <div class="gallery-items">
                            <img src="assets/img/gallery/gallery3.jpg" alt="">
                        </div>
                        <div class="gallery-items">
                            <img src="assets/img/gallery/gallery4.jpg" alt="">
                        </div>
                        <div class="gallery-items">
                            <img src="assets/img/gallery/gallery5.jpg" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Gallery End-->

    </main>
    <?php
include "footer.php"
?>
    </body>
</html>
