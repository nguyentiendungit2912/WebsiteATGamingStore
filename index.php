<!--Add to cart-->
<?php 
if(!isset($_SESSION)){ 
    session_start(); 
} 
$connect = mysqli_connect("localhost", "root", "", "databaseproduction");

if(isset($_POST["add_to_cart"]))
{
	if(isset($_SESSION["shopping_cart"]))
		{
			$counts = 0;		
			foreach($_SESSION["shopping_cart"] as $keys => $values)
			{
				if($_SESSION["shopping_cart"][$keys]['item_id'] == $_GET["id"])
				{
					$counts++;
					$_SESSION["shopping_cart"][$keys]['item_quantity'] = $_SESSION["shopping_cart"][$keys]['item_quantity'] + 1;
				}
			}
			if($counts == 0)
			{
				$item_array = array(
					'item_id'			=>	$_GET["id"],
					'item_name'			=>	$_POST["hidden_name"],
					'item_price'		=>	$_POST["hidden_price"],
					'item_image'		=>	$_POST["hidden_image"],
					'item_quantity'		=>	1
					);
				$_SESSION["shopping_cart"][] = $item_array;
			}
		}
		else
		{
			$item_array = array(
				'item_id'			=>	$_GET["id"],
				'item_name'			=>	$_POST["hidden_name"],
				'item_price'		=>	$_POST["hidden_price"],
				'item_image'		=>	$_POST["hidden_image"],
				'item_quantity'		=>	1
			);
			
			$_SESSION["shopping_cart"][] = $item_array;
		}
}

if(isset($_GET["action"]))
{
	if($_GET["action"] == "delete")
	{
		foreach($_SESSION["shopping_cart"] as $keys => $values)
		{
			if($values["item_id"] == $_GET["id"])
			{
				unset($_SESSION["shopping_cart"][$keys]);
				echo '<script>alert("Item Removed")</script>';
				echo '<script>window.location="index.php"</script>';
			}
		}
	}
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>AT Gaming Shop</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta charset="utf-8">
    <meta name="description" content="AT Gameming Store">
    <meta name="keywords" content="Mouse,keyboard,Chuột,Bàn phím">
    <meta name="author" content="Nguyễn Văn Hải & Nguyễn Tiến Dũng">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
	<link rel="stylesheet" href="./css/style.css">
	
	<link rel="stylesheet" href="./css/cart_style.css">
	<link rel="stylesheet" href="lib/css/bootstrap.css">

	<link rel="stylesheet" href="lib/js/bootstrap.js">

	<link rel="stylesheet" href="./css/owl.carousel.min.css">

    <!-- javascript -->
    <script src="lib/js/jquery.min.js"></script>
    <script src="lib/js/owl.carousel.js"></script>
	<script>
			var count =2;
			var line;
			function xemthem(){
			line = 'block_goiyhn-' + count;
			document.getElementById(line).style.display='block';
			count++;
		}
	</script>
	<!--sildeshow-->
</head>
<body>
	<header id="header">
		<div class="header-top container-flui">
			<span class="support-phone"><i class="fa fa-phone"></i> 24/7 Hỗ trợ khách hàng (+84)347476835</span>
			<span class="address-header"><center>ĐC. 19 Nguyễn Hữu Thọ, phường Tân Phong, quận 7, tp.Hồ Chí Minh</center></span>
			<div class="social-links">
                <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
                <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
                <a href="#" class="instagram"><i class="fa fa-instagram"></i></a>
                <a href="#" class="google-plus"><i class="fa fa-google-plus"></i></a>
				<a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a>
			</div>
		</div>
		<div class="header-main container-fluid">
			<ul id="nav-propsbox-search">
				<li>
					<div id="logo">
						<img src="image/logoweb.png" alt="logo of AT Gaming Store" width="200px" height="200px" onClick="window.location='index.php'">
					</div>
				</li>
				<li class="list-name"><a href="#">Danh mục sản phẩm</a>
					<div class="subs-parent">
						<div class="col">
							<ul>
								<li>
									<a href="#">PC & Laptop</a>
									<div class="subs">
										<div class="col">
											<ul>
												<li><a href="#">Laptop ASUS</a></li>
												<li><a href="#">Laptop Lenovo</a></li>
												<li><a href="#">Macbook</a></li>
												<li><a href="#">Laptop MSI</a></li>
												<li><a href="#">Laptop Dell</a></li>
											
												<li><a href="#">Laptop LG</a></li>
												<li><a href="#">Laptop Acer</a></li>
												<li><a href="#">Laptop HP</a></li>
												<li><a href="#">Laptop theo nhu cầu</a></li>
											</ul>
										</div>
									</div>
								</li>
								<li>
									<a href="#">Chuột, Bàn phím, Tai cầm</a>
									<div class="subs">
										<div class="col">
											<ul>
												<li><a href="#">Chuột Gaming</a></li>
												<li><a href="#">Chuột văn phòng</a></li>
												<li><a href="#">Bàn phím Gaming</a></li>
												<li><a href="#">Bàn phím văn phòng</a></li>
												<li><a href="#">Miếng lót chuột, bàn phím</a></li>
												<li><a href="#">Tay cầm USB</a></li>
												<li><a href="#">Tay cầm Bluetooth</a></li>
											</ul>
										</div>
									</div>
								</li>
								<li>
									<a href="#">Tai nghe & Loa</a>
									<div class="subs">
										<div class="col">
											<ul>
												<li><a href="#">Tai nghe Gaming</a></li>
												<li><a href="#">Tai nghe phổ thông</a></li>
												<li><a href="#">Tai nghe Bluetooth</a></li>
											
												<li><a href="#">Loa vi tính</a></li>
												<li><a href="#">Loa di động, loa kéo</a></li>
												<li><a href="#">Loa Bluetooth</a></li>
											</ul>
										</div>
									</div>
								</li>
								<li>
									<a href="#">Màn hình máy tính</a>
									<div class="subs">
										<div class="col">
											<ul>
												<li><a href="#">Màn hình 17"-21"</a></li>
												<li><a href="#">Màn hình 22"-24"</a></li>
												<li><a href="#">Màn hình 25"-32"</a></li>
												<li><a href="#">Màn hình trên 32"</a></li>
												<li><a href="#">Màn hình chơi game</a></li>
												<li><a href="#">Màn hình thiết kế</a></li>
												<li><a href="#">Màn hình cong</a></li>
												<li><a href="#">Tất cả màn hình</a></li>
											</ul>
										</div>
									</div>
								</li>
								<li>
									<a href="#">Tivi - Smart TV</a>
									<div class="subs">
										<div class="col">
											<ul>
												<li><a href="#">Smart TV</a></li>
												<li><a href="#">QLED/OLED TV</a></li>
												<li><a href="#">LCD/LED TV</a></li>
												<li><a href="#">UHD 4K TV</a></li>
												<li><a href="#">Iternet TV</a></li>
												<li><a href="#">Kích thước TV</a></li>
												<li><a href="#">Chọn giá TV</a></li>
												<li><a href="#">Thương hiệu TV</a></li>
											</ul>
										</div>
									</div>
								</li>
								<li>
									<a href="#">Linh kiện máy tính</a>
									<div class="subs">
										<div class="col">
											<ul>
												<li><a href="#">Bộ vi xử lý - CPU</a></li>
												<li><a href="#">RAM</a></li>
												<li><a href="#">Mainboard</a></li>
												<li><a href="#">Card màn hình - VGA</a></li>
												<li><a href="#">PSU</a></li>
												<li><a href="#">Case</a></li>
												<li><a href="#">Tản nhiệt</a></li>
												<li><a href="#">Linh kiện Laptop</a></li>
											</ul>
										</div>
									</div>
								</li>
							</ul>
						</div>
						<div class="col">
							<ul>
								<li>
									<a href="#">Máy In</a>
									<div class="subs">
										<div class="col">
											<ul>
												<li><a href="#">Máy in đa năng</a></li>
												<li><a href="#">Máy in laser</a></li>
												<li><a href="#">Máy in phun</a></li>
												<li><a href="#">Máy in kim</a></li>
												<li><a href="#">Mực in - Giấy in</a></li>
											</ul>
										</div>
									</div>
								</li>
								<li>
									<a href="#">Ổ cứng HHD/SSD</a>
									<div class="subs">
										<div class="col">
											<ul>
												<li><a href="#">Ổ cứng Intel Optance</a></li>
												<li><a href="#">Ổ cứng HHD</a></li>
												<li><a href="#">Ổ cứng SSD</a></li>
												<li><a href="#">Ổ Cứng Laptop</a></li>
												<li><a href="#">Ổ cứng di động</a></li>
												<li><a href="#">Phụ kiện ổ cứng</a></li>
											</ul>
										</div>
									</div>
								</li>
								<li>
									<a href="#">Thiết bị văn phòng</a>
									<div class="subs">
										<div class="col">
											<ul>
												<li><a href="#">Thiết bị trình chiếu</a></li>
												<li><a href="#">Máy Scan</a></li>
												<li><a href="#">Máy Fax</a></li>
												<li><a href="#">Máy quét mã vạch</a></li>
												<li><a href="#">Máy chủ Server</a></li>
												<li><a href="#">Máy đếm tiền</a></li>
												<li><a href="#">Thiết bị khác</a></li>
											</ul>
										</div>
									</div>
								</li>
								<li>
									<a href="#">Phụ kiện và phần mềm</a>
									<div class="subs">
										<div class="col">
											<ul>
												<li><a href="#">Ghế Gaming</a></li>
												<li><a href="#">Phụ kiện laptop</a></li>
												<li><a href="#">Webcam</a></li>
												<li><a href="#">Điện thoại & Máy tính bảng</a></li>
												<li><a href="#">Thiết bị điện thoại</a></li>
												<li><a href="#">Phần mềm</a></li>
												<li><a href="#">Phụ kiện điện thoại</a></li>
												<li><a href="#">Phụ kiện chung</a></li>
											</ul>
										</div>
									</div>
								</li>
								<li>
									<a href="#">Thiết bị mạng & an ninh</a>
									<div class="subs">
										<div class="col">
											<ul>
												<li><a href="#">Modem/Router</a></li>
												<li><a href="#">ADSL & ADSL wireless</a></li>
												<li><a href="#">Thiết bị mạng chung</a></li>
												<li><a href="#">Camera</a></li>
												<li><a href="#">Thiết bị báo trộm</a></li>
											</ul>
										</div>
									</div>
								</li>
							</ul>
						</div>
					</div>
				</li>
				<li class="btnSearch">
					<div class="search-box">
						<form method="get" action="search.php" id="searchbox5">
							<input id="search51" name="typeahead" class="typeahead" type="text" size="100" placeholder="Tìm kiếm..." autocomplete="off" spellcheck="false"/>
						</form>
					</div>
				</li>
			</ul>	
			<div id="signInAndSignUp" style="margin-top: 0px; padding-top: 30px;">
				<?php $total_item = 0;?>
				<a href="#" class="cart" id="cart_button"><i class="fa fa-shopping-cart"><sup style="font-size: 20px; color: red;" id="count_items"></sup></i><strong>Giỏ hàng</strong></a>
				<a href="login.php" class="signIn" ><i class="fa fa-user"></i><strong id ="login">Đăng nhập</strong></a>
				<script>
					$(document).ready(function(){
						$("#cart_button").click(function(){
							$("#cartBoxes").toggle();
						});
					});
				</script>
			</div>
		</div>
		<div class="header-menu container-fluid">
			<ul class="nav-header-menu">
				<li><a href="#">Trang Chủ</a></li>
				<li><a href="#">Giới Thiệu</a></li>
				<li>
					<a href="#">Liên Hệ</a>
					<div>
						<div class="nav-column-contact">
							<h4>Địa chỉ liên hệ</h4>
							<ul>
								<li><span><strong>Số 19, Nguyễn Hữu Thọ, phường Tân Phong, quận 7, Tp.Hồ Chí Minh</strong></span></li>
								<li><span><strong>Số điện thoại: <a href="tel:0347476835">(+84) 34 474 6835</a></strong></span></li>
								<li><span><strong>Hoặc SĐT: <a href="tel:0334170903">(+84) 33 471 0903</a></strong></span></li>
								<li><span><strong>Email: <a href="mailto:hainguyenvv@gmail.com">hainguyenvv@gmail.com</a></strong></span></li>
							</ul>
						</div>
						<div class="nav-column-contact">
							<div id="map">
									<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15680.25259166246!2d106.69399179999999!3d10.729613!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x317528b2747a81a3%3A0x33c1813055acb613!2sTon+Duc+Thang+University!5e0!3m2!1sen!2s!4v1540894580413" width="640" height="400" frameborder="0" style="border:0" allowfullscreen></iframe>
							</div>
						</div>
					</div>
				</li>
				<li>
					<a href="#">Dịch Vụ</a>
					<div>
						<div class="nav-column">
							<h3 class="orange">Máy tính để bàn</h3>
							<ul>
								<li><a href="#">Gaming</a></li>
								<li><a href="#">Giải trí</a></li>
								<li><a href="#">Đồ họa</a></li>
								<li><a href="#">Văn phòng</a></li>
							</ul>

							<h3 class="orange">Tivi - Smart TV</h3>
							<ul>
								<li><a href="#">Smart TV</a></li>
								<li><a href="#">QLED/OLED TV</a></li>
								<li><a href="#">LCD/LED TV</a></li>
								<li><a href="#">UHD 4K TV</a></li>
								<li><a href="#">Internet TV</a></li>
								<li><a href="#">Kích thước màn hình</a></li>
								<li><a href="#">Chọn giá Tivi</a></li>
								<li><a href="#">Thương hiệu Tivi</a></li>
							</ul>
						</div>
		
						<div class="nav-column">
							<h3 class="orange">Màn hình máy tính</h3>
							<ul>
								<li><a href="#">Màn hình 17"-21"</a></li>
								<li><a href="#">Màn hình 22"-24"</a></li>
								<li><a href="#">Màn hình 25"-32"</a></li>
								<li><a href="#">Màn hình trên 32"</a></li>
								<li><a href="#">Màn hình chơi game</a></li>
								<li><a href="#">Màn hình thiết kế</a></li>
								<li><a href="#">Màn hình cong</a></li>
							</ul>
		
							<h3 class="orange">Ổ cứng HHD/SSD</h3>
							<ul>
								<li><a href="#">Ổ cứng Intel Optance</a></li>
								<li><a href="#">Ổ cứng HHD</a></li>
								<li><a href="#">Ổ cứng SSD</a></li>
								<li><a href="#">Ổ cứng Laptop</a></li>
								<li><a href="#">Ổ cứng di động</a></li>
								<li><a href="#">Phụ kiện ổ cứng</a></li>
							</ul>
						</div>

						<div class="nav-column">
							<h3 class="orange">Linh kiện máy tính</h3>
							<ul>
								<li><a href="#">Bộ vi xử lý - CPU</a></li>
								<li><a href="#">Mainboard</a></li>
								<li><a href="#">PSU</a></li>
								<li><a href="#">RAM</a></li>
								<li><a href="#">Card màn hình - VGA</a></li>
								<li><a href="#">Case</a></li>
								<li><a href="#">Tản nhiệt</a></li>
								<li><a href="#">Linh kiện laptop</a></li>
							</ul>

							<h3 class="orange">Phụ kiện & phần mềm</h3>
							<ul>
								<li><a href="#">Ghế gaming</a></li>
								<li><a href="#">Lót chuột</a></li>
								<li><a href="#">Phụ kiện laptop</a></li>
								<li><a href="#">Webcam</a></li>
								<li><a href="#">Điện thoại</a></li>
								<li><a href="#">Máy tính bảng</a></li>
								<li><a href="#">Thiết bị điện thoại</a></li>
								<li><a href="#">Phụ kiện điện thoại</a></li>
								<li><a href="#">Phần mềm</a></li>
							</ul>
						</div>

						<div class="nav-column">
							<h3 class="orange">Thiết bị văn phòng</h3>
							<ul>
								<li><a href="#">Thiết bị trình chiếu</a></li>
								<li><a href="#">Máy Scan</a></li>
								<li><a href="#">Máy Fax</a></li>
								<li><a href="#">Máy quét mã vạch</a></li>
								<li><a href="#">Máy chủ Server</a></li>
								<li><a href="#">Máy đếm tiền</a></li>
								<li><a href="#">Thiết bị khác</a></li>
							</ul>

							<h3 class="orange">Thiết bị mạng và an ninh</h3>
							<ul>
								<li><a href="#">Modem/Router</a></li>
								<li><a href="#">ADSL & ADSL wireless</a></li>
								<li><a href="#">Thiết bị mạng chung</a></li>
								<li><a href="#">Camera</a></li>
								<li><a href="#">Thiết bị báo trộm</a></li>
							</ul>
						</div>

						<div class="nav-column">
							<h3 class="orange">Máy In</h3>
							<ul>
								<li><a href="#">Máy in đa năng</a></li>
								<li><a href="#">Máy in laser</a></li>
								<li><a href="#">Máy in phun</a></li>
								<li><a href="#">Máy in kim</a></li>
								<li><a href="#">Mực in - Giấy in</a></li>
							</ul>
						</div>
					</div>
				</li>
				<li>
					<a href="#">PC & Laptop</a>
					<div>
						<div class="nav-column">
							<h3 class="orange">Laptop - Gaming</h3>
							<ul>
								<li><a href="#">Laptop ASUS</a></li>
								<li><a href="#">Laptop MSI</a></li>
								<li><a href="#">Laptop Acer</a></li>
								<li><a href="#">Laptop Lenovo</a></li>
								<li><a href="#">Laptop Dell</a></li>
								<li><a href="#">Laptop HP</a></li>
								<li><a href="#">Laptop LG</a></li>
							</ul>
						</div>

						<div class="nav-column">
							<h3 class="orange">Laptop - Doanh nhân</h3>
							<ul>
								<li><a href="#">Macbook</a></li>
								<li><a href="#">Laptop ASUS</a></li>
								<li><a href="#">Laptop MSI</a></li>
								<li><a href="#">Laptop Acer</a></li>
								<li><a href="#">Laptop Lenovo</a></li>
								<li><a href="#">Laptop Dell</a></li>
								<li><a href="#">Laptop HP</a></li>
								<li><a href="#">Laptop LG</a></li>
							</ul>
						</div>
		
						<div class="nav-column">
							<h3 class="orange">PC - Máy bộ GEARVN</h3>
							<ul>
								<li><a href="#">Dưới 20 triệu</a></li>
								<li><a href="#">Từ 20 - 30 triệu</a></li>
								<li><a href="#">Từ 30 - 40 triệu</a></li>
								<li><a href="#">Từ 40 - 50 triệu</a></li>
								<li><a href="#">Từ 50 - 60 triệu</a></li>
								<li><a href="#">Từ 60 - 70 triệu</a></li>
								<li><a href="#">Từ 70 - 80 triệu</a></li>
								<li><a href="#">Trên 80 triệu</a></li>
							</ul>
						</div>
						<div class="nav-column">
							<h3 class="orange">PC - WORKSTATION</h3>
							<h3 class="orange">MINI PC - INTEL NUC</h3>
						</div>
					</div>
				</li>
				<li>
					<a href="#">Chuột & Bàn Phím & Tai Nghe</a>
					<div>
						<div class="nav-column">
							<h3 class="orange">Lót chuột</h3>
							<ul>
								<li><a href="#">RAZER</a></li>
								<li><a href="#">STEELSERIES</a></li>
								<li><a href="#">LOGITECH</a></li>
								<li><a href="#">CORSAIR</a></li>
							</ul>
						</div>
			            <div class="nav-column">
							<h3 class="orange">Chuột</h3>
							<ul>
								<li><a href="#">RAZER</a></li>
								<li><a href="#">ZOWIE</a></li>
								<li><a href="#">STEELSERIES</a></li>
								<li><a href="#">LOGITECH</a></li>
								<li><a href="#">CORSAIR</a></li>
								<li><a href="#">FUHLEN</a></li>
								<li><a href="#">COUGAR</a></li>
								<li><a href="#">DARE-U</a></li>
								<li><a href="#">RAPOO</a></li>
								<li><a href="#">COOLER MASTER</a></li>
								<li><a href="#">VORTEX</a></li>
								<li><a href="#">I-ROCKS</a></li>
							</ul>
						</div>
						<div class="nav-column">
							<h3 class="orange">Bàn phím</h3>
							<ul>
								<li><a href="#">RAZER</a></li>
								<li><a href="#">ZOWIE</a></li>
								<li><a href="#">STEELSERIES</a></li>
								<li><a href="#">LOGITECH</a></li>
								<li><a href="#">CORSAIR</a></li>
								<li><a href="#">FUHLEN</a></li>
								<li><a href="#">COUGAR</a></li>
								<li><a href="#">DARE-U</a></li>
								<li><a href="#">RAPOO</a></li>
								<li><a href="#">COOLER MASTER</a></li>
								<li><a href="#">VORTEX</a></li>
								<li><a href="#">I-ROCKS</a></li>
								<li><a href="#">LEOPOLD</a></li>
								<li><a href="#">IKBC</a></li>
								<li><a href="#">DUCKY</a></li>
							</ul>
						</div>
						<div class="nav-column">
							<h3 class="orange">Tai nghe</h3>
							<ul>
								<li><a href="#">RAZER</a></li>
								<li><a href="#">HYPERX</a></li>
								<li><a href="#">STEELSERIES</a></li>
								<li><a href="#">LOGITECH</a></li>
								<li><a href="#">CORSAIR</a></li>
								<li><a href="#">DARE-U</a></li>
								<li><a href="#">RAPOO</a></li>
								<li><a href="#">MSI</a></li>
								<li><a href="#">ACER PREDATOR</a></li>
								<li><a href="#">ASUS</a></li>
								<li><a href="#">PLANTONIC</a></li>
							</ul>
						</div>
					</div>
				</li>
				<li><a href="#">Tư vấn và Hỗ trợ</a></li>
				<li><a href="#">Tin tức</a></li>
				<li><a href="#">Trung tâm bảo hành </a></li>
			</ul>
		</div>
	</header>
	
    <section>
		<div id="cartBoxes" style="width: 700px; height: auto; border: 2px solid navy; border-radius: 5px; position:absolute; z-index: 1000; background-color:#FFF; top:100px; display: none; margin-left: 635px; top: 130px;">
			<table class="table table-bordered">
				<tr class="showproCarted">
					<th width="21%"><center>Tên sản phẩm</center></th>
					<th width="20%"><center>Hình sản phẩm</center></th>
					<th width="10%"><center>Số lượng</center></th>
					<th width="22%"><center>Giá sản phẩm</center></th>
					<th width="22%"><center>Tổng tiền</center></th>
					<th width="5%"></th>
				</tr>
				<?php
					if(!empty($_SESSION["shopping_cart"])){
						$total = 0;
						$total_item = 0;
						foreach($_SESSION["shopping_cart"] as $keys => $values){
				?>
				<tr style="border: 0px; background-color: #D8DCD8;">
					<td style="border: 0px;"><span class="shownamePro"><center><?php echo $values["item_name"]; ?></center></span></td>
					<td style="border: 0px;"><span class="showimagePro"><center><img src="<?php echo $values["item_image"]; ?>" style="width: 50px; height: 50px;"></center></span></td>
					<td style="border: 0px;"><span class="showquantityPro"><center><?php echo $values["item_quantity"]; ?></center></span></td>
					<td style="border: 0px;"><span class="showpricePro"><center><?php echo $values["item_price"]; ?> VNĐ</center></span></td>
					<td style="border: 0px;"><span class="showTotalpricePro"><center><?php echo number_format($values["item_quantity"] * $values["item_price"], 2);?> VNĐ</center></span></td>
					<td style="border: 0px;"><a href="index.php?action=delete&id=<?php echo $values["item_id"]; ?>"><center><button class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></button></center></a></td>
				</tr>
				<?php
						$total_item = $total_item + 1;
						$total = $total + ($values["item_quantity"] * $values["item_price"]);
					}
				?>
				<tr class="showTotalAndComeback">
					<td colspan="4" align="right" style="border: 0px;"><strong> Tổng cộng : <?php echo number_format($total, 2); ?> VNĐ</strong></td>
					<td colspan="2" align="right" style="border: 0px;"><a href="Webpage_Muahang.php" style="background-color: #12BF0C; padding: 10px; color: black; border-radius: 20px; text-decoration: none;"><i class="fa fa-shopping-cart"></i> &nbsp <strong>Thanh toán<strong></a></td>
				</tr>
				<?php
					}else{
						//echo '<p style="display: inline-block; background-color: red; color: #C70039;"><center>gio hang cua ban rong</center></p>';?>
						<script>
							$(document).ready(function(){
								$("#cartBoxes").css("width", "0px");
								$("#cartBoxes").css("border", "0px");
								$(".showproCarted").css("display", "none");
							});
						</script>
						<div class="emptyCart" style="background: #fff; width: 170px; height: auto; padding: 10px; margin-left:380px;">
							<img src="image/icon/carticon.jpg" style="width: 150px; height: 150px; margin-bottom: 10px;">
							<h6><center>Giỏ hàng trống</center><h6>
						</div>
						
					<?php }
				?>
			</table>
		</div>
	</section>
	<script>
		var counts = <?php echo $total_item;?>;
		if(counts > 0){
			document.getElementById('count_items').innerHTML = counts;
		}else{
			document.getElementById('count_items').innerHTML = "0";
			document.getElementById('count_items').style.display = "none";
		}
	</script>
	<?php include 'quangcao.php';?>
	<?php $value = 10; ?>
	
	<main>
		<section class="section-hot-product">
			<div class="contents">
				<div class="titleContents"> 
					<span> Sản Phẩm Mới</span>
				</div>
		
				<div class="Allline">
					<div class="owl-carousel owl-theme">
						<?php 
							$servername = "localhost";
							$username = "root";
							$password = "";
							$dbname = "databaseproduction";
								 
							// Create connection
							$conn = new mysqli($servername, $username, $password, $dbname);
							// Check connection
							if ($conn->connect_error) {
								die("Connection failed: " . $conn->connect_error);
							}

							$sql = "SELECT id,name,image,price FROM productions";
							$result = $conn->query($sql);
							
							if($result->num_rows > 0){
								while($row = $result->fetch_assoc()){
						?>
									<div class="spline1">
										<div class="sp">
											<form method="post" action="index.php?action=add&id=<?php echo $row['id']; ?>">
												<div class="imgsp">
													<img src="<?php echo $row['image']; ?>"><br>
												</div>
														
												<div class="namesp">
													<span><?php echo $row['name'];?></span><br>
												</div>
														
												<div class="costsp">
													<span><?php echo $row['price'];?></span><br>
												</div>
												<div class="infosp" style="padding-bottom: 10px; padding-top: 5px">
													<a href="Webpage_Review.php?id=<?php echo $row['id'];?>">Xem chi tiết</a>
													<a href="#"><input type="submit" name="add_to_cart" value="Mua hàng" id="Addtocart"></a>
												</div>
												<input type="hidden" name="hidden_name" value="<?php echo $row["name"]; ?>" />
												<input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>" />
												<input type="hidden" name="hidden_image" value="<?php echo $row["image"]; ?>" />
											</form>
										</div>
									</div>
						<?php	}
							}else{
								echo "0 result";
							}
							$conn->close();
						?>
						<script>
							$(document).ready(function() {
								$('.owl-carousel').owlCarousel({
									margin: 10,
									loop: true,
									autoWidth: true,
									items: 4
								})
							})
						</script>
					</div>
				</div>
			</div>
		</section>
		
		<section class="section-sale-product">
			<div class="contents">
				<div class="titleContents"> 
					<span> Sản Phẩm Khuyến Mãi</span>
				</div>
		
				<div class="Allline">
					<div class="owl-carousel owl-theme">
						<?php 
							$servername = "localhost";
							$username = "root";
							$password = "";
							$dbname = "databaseproduction";
								 
							// Create connection
							$conn = new mysqli($servername, $username, $password, $dbname);
							// Check connection
							if ($conn->connect_error) {
								die("Connection failed: " . $conn->connect_error);
							}

							$sql = "SELECT id,name,image,price FROM productions";
							$result = $conn->query($sql);
							
							if($result->num_rows > 0){
								while($row = $result->fetch_assoc()){
						?>
									<div class="spline1">
										<div class="sp">
											<form method="post" action="index.php?action=add&id=<?php echo $row['id']; ?>">
												<div class="imgsp">
													<img src="<?php echo $row['image']; ?>"><br>
												</div>
														
												<div class="namesp">
													<span><?php echo $row['name'];?></span><br>
												</div>
														
												<div class="costsp">
													<span><?php echo $row['price'];?></span><br>
												</div>
												<div class="infosp" style="padding-bottom: 10px; padding-top: 5px">
													<a href="Webpage_Review.php?id=<?php echo $row['id'];?>">Xem chi tiết</a>
													<a href="#"><input type="submit" name="add_to_cart" value="Mua hàng" id="Addtocart"></a>
												</div>
												<input type="hidden" name="hidden_name" value="<?php echo $row["name"]; ?>" />
												<input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>" />
												<input type="hidden" name="hidden_image" value="<?php echo $row["image"]; ?>" />
											</form>
										</div>
									</div>
						<?php	}
							}else{
								echo "0 result";
							}
							$conn->close();
						?>
						<script>
							$(document).ready(function() {
								$('.owl-carousel').owlCarousel({
									margin: 10,
									loop: true,
									autoWidth: true,
									items: 4
								})
							})
						</script>
					</div>
				</div>
			</div>
		</section>
		<section class="section-themost-buy-product">
			<div class="contents">
				<div class="titleContents"> 
					<span> Sản phẩm mua nhiều nhất trong tháng</span>
				</div>
		
				<div class="Allline">
					<div class="owl-carousel owl-theme">
						<?php 
							$servername = "localhost";
							$username = "root";
							$password = "";
							$dbname = "databaseproduction";
								 
							// Create connection
							$conn = new mysqli($servername, $username, $password, $dbname);
							// Check connection
							if ($conn->connect_error) {
								die("Connection failed: " . $conn->connect_error);
							}

							$sql = "SELECT id,name,image,price FROM productions";
							$result = $conn->query($sql);
							
							if($result->num_rows > 0){
								while($row = $result->fetch_assoc()){
						?>
									<div class="spline1">
										<div class="sp">
											<form method="post" action="index.php?action=add&id=<?php echo $row['id']; ?>">
												<div class="imgsp">
													<img src="<?php echo $row['image']; ?>"><br>
												</div>
														
												<div class="namesp">
													<span><?php echo $row['name'];?></span><br>
												</div>
														
												<div class="costsp">
													<span><?php echo $row['price'];?></span><br>
												</div>
												<div class="infosp" style="padding-bottom: 10px; padding-top: 5px">
													<a href="Webpage_Review.php?id=<?php echo $row['id'];?>">Xem chi tiết</a>
													<a href="#"><input type="submit" name="add_to_cart" value="Mua hàng" id="Addtocart"></a>
												</div>
												<input type="hidden" name="hidden_name" value="<?php echo $row["name"]; ?>" />
												<input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>" />
												<input type="hidden" name="hidden_image" value="<?php echo $row["image"]; ?>" />
											</form>
										</div>
									</div>
						<?php	}
							}else{
								echo "0 result";
							}
							$conn->close();
						?>
						<script>
							$(document).ready(function() {
								$('.owl-carousel').owlCarousel({
									margin: 10,
									loop: true,
									autoWidth: true,
									items: 4
								})
							})
						</script>
					</div>
				</div>
			</div>
		</section>
		<section class="section-goiyhomnay-product">
				<div class="goihnnn">
						<div class="titleContents"> 
							<span>Gợi ý hôm nay</span>
						</div>
						
						<?php 
							$value = 1;
							for ($i = 1; $i <= 5; $i++){
								if($i == 1){
									echo"<div class='goihnn' id='block_goiyhn-1'>";
								}else{
									echo"<div class='goihnn' id='block_goiyhn-$i' style='display:none'>";
								}
								echo"<div class='goihn'>";?>
								
								<?php 
							$servername = "localhost";
							$username = "root";
							$password = "";
							$dbname = "databaseproduction";
								 
							// Create connection
							$conn = new mysqli($servername, $username, $password, $dbname);
							// Check connection
							if ($conn->connect_error) {
								die("Connection failed: " . $conn->connect_error);
							}

							$sql = "SELECT id,name,image,price FROM productions";
							$result = $conn->query($sql);
							
							if($result->num_rows > 0){
								while($row = $result->fetch_assoc()){
						?>
										<div class='spline2'>
											<div class='sp'> 
												<form method="post" action="index.php?action=add&id=<?php echo $row['id']; ?>">
													<div class='imgsp' style="display: block">
														<img src="<?php echo $row["image"]; ?>">
													</div>
													<div class='namesp' style="display: block">
														<span><?php echo $row["name"]; ?></span>
													</div>
													<div class='costsp' style="display: block">
														<span><?php echo $row["price"]; ?> VNĐ</span>
													</div>
													<div class='infosp' style="display: block">
														<a href="Webpage_Review.php?id=<?php echo $row['id'];?>">Xem chi tiết</a>
														<a href="#"><input type="submit" name="add_to_cart" value="Mua hàng" id="Addtocart"></a>
													</div>
													<input type="hidden" name="hidden_name" value="<?php echo $row["name"]; ?>" />
													<input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>" />
													<input type="hidden" name="hidden_image" value="<?php echo $row["image"]; ?>" />
												</form>
											</div>
										</div>
								<?php	}
							}else{
								echo "0 result";
							}
							$conn->close();
						?>
							<?php		
									
									echo"</div> </div>";
							}?>	
						

						
			</div>
		</section>
		<div class="xemthempp">
				<button class="xemthemsp" onClick="xemthem()">Xem thêm</button>
		</div>
	</main>
	
	<!--==============================
	                 Footer
	===============================-->
   <?php include 'footer.php';?>
	<!--==============================
	                 Footer
	===============================-->
	<!--back to top button-->
    <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
	
	<script src="js/main.js"></script>
	<!-- vendors -->
    <script src="js/highlight.js"></script>
    <script src="js/app.js"></script>
	<script src="js/typeahead.min.js"></script>
</body>
</html>
