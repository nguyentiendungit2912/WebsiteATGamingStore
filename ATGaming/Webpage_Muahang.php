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
	<link rel="stylesheet" href="./css/style2.css">
    <link rel="stylesheet" href="./css/style.css">
	<link rel="stylesheet" href="lib/css/bootstrap.css">
	<link rel="stylesheet" href="lib/js/bootstrap.js">
	<!--sildeshow-->
	<script src="./js/main.js"> </script>
</head>
<body>
	<?php include 'introduction.php';?>
    <!---=====================================Dat Hang=========================================== -->
	<div class="DatHang">
		<form action="getInformationsOfCustomer.php" method="post">
		<div class="customerInfo">
            <div class="title-customerInfo">
            	<span>Thông Tin Giao Hàng</span><br>
                <span>Bạn đã có tài khoản chưa? </span>
                <a href="#"> Đăng nhập </a><br>
            </div>
            <div class="input-customerInfo">
             	<input type="text" name="name" placeholder="Họ và Tên"><br>
                <input type="email" name="email" placeholder=" Email"><br>
                <input type="text" name="phone" placeholder="Số điện thoại"><br>
                <select name="province"> 
					<option>Tỉnh/Thành phố</option>
                 	<option>TP Hồ Chí Minh</option>
					<option>Hà Nội</option>
					<option>Đà Nẵng</option>
					<option>Nha Trang</option>
                    <option>Đăk Lăk</option>
                    <option>Gia Lai</option>
                    <option>Phú Yên</option>
                    <option>Ninh Bình</option>
                </select><br>
				<select name="district"> 
                    <option>Quận/Huyện</option>
                 	<option>TP Hồ Chí Minh</option>
					<option>Hà Nội</option>
					<option>Đà Nẵng</option>
					<option>Nha Trang</option>
                    <option>Đăk Lăk</option>
                    <option>Gia Lai</option>
                    <option>Phú Yên</option>
                    <option>Ninh Bình</option>
                </select><br>		
                <select name="town"> 
                    <option>Thị Xã</option>
                 	<option>TP Hồ Chí Minh</option>
					<option>Hà Nội</option>
					<option>Đà Nẵng</option>
					<option>Nha Trang</option>
                    <option>Đăk Lăk</option>
                    <option>Gia Lai</option>
                    <option>Phú Yên</option>
                    <option>Ninh Bình</option>
                </select><br>
                <input type="text" name="address" placeholder="Số nhà - số đường"><br>
                <input type="text" name="note" placeholder="Ghi chú" id="note"><br>
            </div>
            <div class="submit-customerInfo" style="display: inline-block; margin-bottom: 20px;">
             	<a href="index.php"> Quay lại giỏ hàng </a>
                <input type="submit" name="dathang" value="Đặt Hàng">
            </div>
        </div>
        <div class="CostCustomer">
        	<div class="TitleCostCustomer"> 
            	<h3> Sản phẩm đã thêm vào giỏ hàng</h3>
            </div>
			<?php
				if(!empty($_SESSION["shopping_cart"])){
					$total = 0;
					$total_item = 0;
					$i = 1;
					foreach($_SESSION["shopping_cart"] as $keys => $values){
			?>
        	<div class="CostCustomerSP">
                	<span style="display: inline-block; float: left;"><img src="<?php echo $values["item_image"]; ?>"></span>
                    <span style="display: inline-block; margin-left: 30px;"><?php echo $values["item_name"]; ?></span>
                 	<span style="display: inline-block; float: right;"><?php echo number_format($values["item_quantity"] * $values["item_price"], 2);?> VNĐ</span>
            </div>
			<input type="hidden" name="hidden_name<?php echo $i; ?>" value="<?php echo $values["item_name"]; ?>" />
			<input type="hidden" name="hidden_price<?php echo $i; ?>" value="<?php echo $values["item_price"]; ?>" />
            <?php
						$i++;
						$total_item++;
						$total = $total + ($values["item_quantity"] * $values["item_price"]);
					}
				?>
            <div class="AllCostCustomer"> 
            	<hr> </hr>
            	<span style="display: inline-block; float: left;"> Phí tạm tính : </span>
                <span style="display: inline-block; float: right;"><?php echo number_format($total, 2); ?> VNĐ</span><br>
                <span style="display: inline-block; float: left;"> Phí vận chuyển : </span>
                <span style="display: inline-block; float: right;">40000 VNĐ</span><br>
                <hr> </hr>
                <h3> <span style="color:#F00;font-size:30px;font-weight:bold;">Tổng Tiền </span> : <?php echo number_format($total + 40000, 2); ?> VNĐ 	 </h3>
				<input type="hidden" name="hidden_total_products" value="<?php echo $total_item; ?>" />
				<input type="hidden" name="hidden_totalAmount" value="<?php echo number_format($total + 40000, 2); ?>" />
            </div>
			<?php
				}
			?>
        </div>
		</form>
    </div>
    <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
	<?php include 'footer.php';?>
</body>
</html>
