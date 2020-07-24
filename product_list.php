<!DOCTYPE html>
<html lang="zxx">
	<head>
		<meta charset="utf-8" />
		<meta http-equiv="x-ua-compatible" content="ie=edge" />
		<title>eCommerce HTML-5 Template</title>
		<meta name="description" content="" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="manifest" href="site.webmanifest" />
		<link
			rel="shortcut icon"
			type="image/x-icon"
			href="assets/img/favicon.ico"
		/>

		<!-- CSS here -->
		<link rel="stylesheet" href="assets/css/bootstrap.min.css" />
		<link rel="stylesheet" href="assets/css/owl.carousel.min.css" />
		<link rel="stylesheet" href="assets/css/flaticon.css" />
		<link rel="stylesheet" href="assets/css/slicknav.css" />
		<link rel="stylesheet" href="assets/css/animate.min.css" />
		<link rel="stylesheet" href="assets/css/magnific-popup.css" />
		<link rel="stylesheet" href="assets/css/fontawesome-all.min.css" />
		<link rel="stylesheet" href="assets/css/themify-icons.css" />
		<link rel="stylesheet" href="assets/css/slick.css" />
		<link rel="stylesheet" href="assets/css/nice-select.css" />
		<link rel="stylesheet" href="assets/css/style.css" />
	</head>

	<body>
		<?php
include "header.php";
include "control/searchControl.php";
$datas = [];
// biến data để chứa các kết quả tìm kiếm trả về ...
if (isset($_GET['Search']) && isset($_GET['btn_search'])) {
    // đây chính là để bắt sự kiện ở header của ta
    // ở trên phía cuối header mấy em có thấy một cái ô input search
    // khi mấy em nhập tên sản phẩm và bấm vào btn có hình kính lúp
    // thì nó sẽ gửi dữ liệu mấy em đã ghi và gửi nhẹ nó qua trang product_list này
    // trang này sẽ dùng $get để lấy dữ liệu ra
    // và gọi hàm searchProducts bên trang searchControl
    // rồi bấm qua searchControl.php xem đi nào :)
    $search = $_GET['Search'];
    $datas = searchProducts($search);
}
if (isset($_GET['btn_post'])) {
    $search1 = $_GET['Search'];
    $catagori = $_GET['catagori'];
    $category = $_GET['category'];
    // lấy ra các dữ liệu từ cái form ở trang này của ta
    // và gọi cái hàm searchProducts bên trang searchControl truyền vào
    // đầy đủ 3 tham số của nó luôn :v
    $datas = searchProducts($search1, $catagori, $category);
}
?>
		<!-- slider Area Start-->
		<div class="slider-area">
			<!-- Mobile Menu -->
			<div
				class="single-slider slider-height2 d-flex align-items-center"
				data-background="assets/img/hero/category.jpg"
			>
				<div class="container">
					<div class="row">
						<div class="col-xl-12">
							<div class="hero-cap text-center">
								<h2>product list</h2>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- slider Area End-->

		<!-- product list part start-->
		<section class="product_list section_padding">
			<div class="container">
				<div class="row">
					<div class="col-md-4">
						<form method="get" action="product_list.php">
							<div class="product_sidebar">
								<div class="single_sedebar">
									<input type="text" name="Search" placeholder="Search keyword" />
									<i class="ti-search"></i>
								</div>
								<div class="single_sedebar py-5">
									<div class="select_option">
										<select class="country_select" name="catagori">
                                        <option value="none">Catagory</option>
											<option value="New">New</option>
											<option value="Featured">Featured</option>
											<option value="Offer">Offer</option>
										</select>
									</div>
								</div>
								<div class="single_sedebar py-5">
									<div class="select_option">
										<select class="country_select" name="category">
                                        <option value="none">Category</option>
											<option value="Outer Wear">Outer Wear</option>
											<option value="Bottom"> Bottom</option>
											<option value="Shirt"> Shirt</option>
											<option value="Jacket"> Jacket</option>
										</select>
									</div>
								</div>
								<button class="btn_3" type="submit" name="btn_post">
									Search now
								</button>
							</div>
						</form>
					</div>
					<div class="col-md-8">
						<div class="product_list">
							<div class="row">
							<!-- Nếu cái data của ta nó rổng nghĩa là người dùng chưa tìm kiếm gì cả -->
						<!-- Thì ta sẽ hiện cái hình và dòng chữ cho người dùng thấy-->
                                <?php if (count($datas) != 0) {?>
                        <!-- Còn không thì sẽ chạy vòng lặp-->
						<!-- Để hiển thị ra các sản phẩm tìm kiếm được  -->
						<!-- Ở trong database của ta -->
						            <?php foreach ($datas as $item) {?>
                                    <div class="col-lg-6 col-sm-6">
									<div class="single_product_item">
										<img
											src=<?php echo $item["image"] ?>
											alt=""
											class="img-fluid"
										/>
										<h3>
											<a href="single-product.html"
												><?php echo $item["name"] ?></a
											>
										</h3>
										<p>$<?php echo $item["price"] ?></p>
									</div>
								</div>
                                <?php }?>
                                    <?php } else {?>
                                        <div class="col-lg-12 col-sm-12">
                                        <div class="single_product_item">
                                        <img
											src="assets/img/empty.jpeg"
											alt=""
											class="img-fluid"
                                        />
                                        <h3>
											Không có sản phẩm nào trùng
										</h3>
                                    </div>
                                    </div>
                                    <?php }?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- product list part end-->

		<!-- client review part here -->
		<section class="client_review">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-lg-8">
						<div class="client_review_slider owl-carousel">
							<div class="single_client_review">
								<div class="client_img">
									<img src="assets/img/client.jpg" alt="#" />
								</div>
								<p>
									"Giá cả vừa phải, chất lượng sản phẩm ok, mẫu mã rất đa dạng,
									bắt kịp xu hướng mới, nhân viên chu đáo, nhiệt tình
								</p>
								<h5>-Thu Trang</h5>
							</div>
							<div class="single_client_review">
								<div class="client_img">
									<img src="assets/img/client1.jpg" alt="#" />
								</div>
								<p>
									"Shop bán đồ đẹp giá cả hợp lý, nhân viên tư vấn nhiệt
									tình,Kiểu dáng rất đẹp, mình rất ưng ý :)
								</p>
								<h5>-Trinh Yumi</h5>
							</div>
							<div class="single_client_review">
								<div class="client_img">
									<img src="assets/img/client2.jpg" alt="#" />
								</div>
								<p>
									"Nhân viên siêu dễ thương, tư vấn nhiệt tình, chu đáo. sản
									phẩm chất lượng , 10đ cho shop :))
								</p>
								<h5>-Phương Trần</h5>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- client review part end -->

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

		<!-- subscribe part here -->
		<section class="subscribe_part section_padding">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-lg-8">
						<div class="subscribe_part_content">
							<h2>Get promotions & updates!</h2>
							<p>
								Seamlessly empower fully researched growth strategies and
								interoperable internal or “organic” sources credibly innovate
								granular internal .
							</p>
							<div class="subscribe_form">
								<input type="email" placeholder="Enter your mail" />
								<a href="#" class="btn_1">Subscribe</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- subscribe part end -->
		<?php
include "footer.php"
?>
	</body>
</html>
