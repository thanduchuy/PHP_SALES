<?php session_start();
ob_start();
?>
<!-- Preloader Start -->
<div id="preloader-active">
	<div class="preloader d-flex align-items-center justify-content-center">
		<div class="preloader-inner position-relative">
			<div class="preloader-circle"></div>
			<div class="preloader-img pere-text">
				<img src="assets/img/logo/logo.png" alt="" />
			</div>
		</div>
	</div>
</div>
<!-- Preloader Start -->

<header>
	<!-- Header Start -->
	<div class="header-area">
		<div class="main-header">
			<div class="header-top top-bg d-none d-lg-block">
				<div class="container-fluid">
					<div class="col-xl-12">
						<div class="row d-flex justify-content-between align-items-center">
							<div class="header-info-left d-flex">
								<div class="flag">
									<img src="assets/img/icon/header_icon.png" alt="" />
								</div>
								<div class="select-this">
									<form action="#">
										<div class="select-itms">
											<select name="select" id="select1">
												<option value="">VN</option>
												<option value="">USA</option>
												<option value="">JP</option>
												<option value="">KR</option>
											</select>
										</div>
									</form>
								</div>
								<ul class="contact-now">
									<li>MÃ NGUỒN MỞ</li>
								</ul>
							</div>
							<div class="header-info-right">
								<ul>
									<li>
										<a
											href="https://www.facebook.com/profile.php?id=100011462289371"
											>Trang</a
										>
									</li>
									<li>
										<a
											href="https://www.facebook.com/profile.php?id=100008287636174"
											>Trinh</a
										>
									</li>
									<li>
										<a
											href="https://www.facebook.com/profile.php?id=100012975348690"
											>Phương</a
										>
									</li>
									<li>
										<a href="https://www.facebook.com/tam.phamthiminh.5">Tâm</a>
									</li>
									<li>
										<a href="https://www.facebook.com/ngan190020">Ngân</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="header-bottom header-sticky">
				<div class="container-fluid">
					<div class="row align-items-center">
						<!-- Logo -->
						<div class="col-xl-1 col-lg-1 col-md-1 col-sm-3">
							<div class="logo">
								<a href="index.php"
									><img src="assets/img/logo/logo.png" alt=""
								/></a>
							</div>
						</div>
						<div class="col-xl-6 col-lg-8 col-md-7 col-sm-5">
							<!-- Main-menu -->
							<div class="main-menu f-right d-none d-lg-block">
								<nav>
									<ul id="navigation">
										<li><a href="index.php">Home</a></li>
										<li><a href="Catagori.php">Catagori</a></li>
										<li><a href="product_list.php"> Product list</a></li>
										<li><a href="contact.php">Contact</a></li>
										<!-- như đã nói ở những phần trước thì ta sẽ sữ dụng -->
										<!-- session để lưu trữ phiên đăng nhập của nguời dùng  -->
										<!-- nếu session đã được khởi tạo thì có nghĩa là người dùng đã đăng nhập -->
										<!-- nếu không thì có nghĩa là chưa đăng nhập thui :) -->
										<?php if (isset($_SESSION['user'])) {?>
										<li class="hot">
											<a href="#"><?php echo $_SESSION['user'] ?></a>
											<ul class="submenu">
												<li><a href="logout.php">Đăng xuất</a></li>
											</ul>
										</li>
										<!-- xuất hiện nút đăng xuất khi người dùng đăng nhập thành công -->
										<!-- nếu session có thì cho phép người dùng đăng xuất -->
										<!-- cái nút đăng xuất là thẻ a nó sẽ dẫn người dùng đến trang logout -->
										<?php }?>
									</ul>
								</nav>
							</div>
						</div>
						<div class="col-xl-5 col-lg-3 col-md-3 col-sm-3 fix-card">
							<ul
								class="header-right f-right d-none d-lg-block d-flex justify-content-between"
							>
								<li class="d-none d-xl-block">
									<form method="get" action="product_list.php">
										<div class="form-box f-right">
											<input
												type="text"
												name="Search"
												placeholder="Search products"
												class="px-5"
											/>
											<button
												type="submit"
												class="search-icon"
                                                style="background-color: white; border: none;"
                                                name="btn_search"
                                                value="true"
											>
												<i class="fas fa-search special-tag"></i>
											</button>
										</div>
									</form>
								</li>
								<li>
									<div class="shopping-card">
										<a href="cart.php"><i class="fas fa-shopping-cart"></i></a>
									</div>
								</li>
								<?php if (!isset($_SESSION['user'])) {?>
								<li class="d-none d-lg-block">
									<a href="login.php" class="btn header-btn">Sign in</a>
								</li>
								<?php }?>
								<!-- Còn ở đây thì nếu chưa đăng nhập thì nó sẽ hiện nút sign in -->
								<!-- Để cho người dùng có thể đăng nhập được -->
								<!-- Nó là thẻ a cũng hướng người dùng đến trang login để người dùng đăng kí hoặc đăng nhập -->
							</ul>
						</div>
						<!-- Mobile Menu -->
						<div class="col-12">
							<div class="mobile_menu d-block d-lg-none"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Header End -->
</header>
