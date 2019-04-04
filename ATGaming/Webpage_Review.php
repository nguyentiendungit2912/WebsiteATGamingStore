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
	<link rel="stylesheet" href="./css/style1.css">
	<link rel="stylesheet" href="lib/css/bootstrap.css">
	<link rel="stylesheet" href="lib/js/bootstrap.js">
	<!--sildeshow-->
	
	<script src="./js/main.js"> </script>
</head>
<body>
	<?php include 'introduction.php';?>
	<?php $id = $_GET['id']?>
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

		$sql = "SELECT * FROM productions WHERE id ='$id'";
		$result = $conn->query($sql);
	?>
	<div class="midd"> 
		<form method="post" action="index.php?action=add&id=<?php echo $id; ?>">
        <div class="mid-left">
			<?php if($result->num_rows > 0){
				while($row = $result->fetch_assoc()){
					echo '<img src="'.$row['image'].'" style="width:510px;height:450px;margin-bottom:10px;"/>';
					echo '<div id="imageqc">';
						echo '<img src="'.$row['image1'].'"/>';
						echo '<img src="'.$row['image2'].'"/>';
						echo '<img src="'.$row['image3'].'"/>';
						echo '<img src="'.$row['image4'].'"/>';
						echo '<img src="'.$row['image5'].'"/>';
					echo "</div>";
			?>
        </div>
        
        <div class="mid-right">
        	<div class="infonamesp">
			<?php echo "<span> [Chính Hãng]" .$row['name']. "</span>";?>
            </div>
            <div class = "infocostsp">
				<?php 
					$saleOf = 1.15;
					$saleof = ($saleOf - 1) * 100;
					$prices = $row['price'] * $saleOf;
					echo '<span class="costgoc">'.$prices.'đ</span>';
					echo '<span class="costgiam">'.$row['price'].'đ</span>';
					echo '<span class="giam"> Giảm giá tới: '.$saleof.'%</span>';
				?>
            </div>
            <div class="vanchuyen">
            	<span class="chung" style="color: #8B0000;">Chi tiết sản phẩm</span>
                <div class="phivanchuyen" style="font-size: 20px; margin-left:150px;">
                	<?php
						$countProD = $row['amount'];
						echo '<p style="color: blue;"> Mã số code sản phẩm:  '.$row['code'].'</p>';
						echo '<p>'.$row['description'].'</p>';
						if($countProD > 0){
							echo '<p style="color: #FF6347;"> Sản phẩm hiện tại shop vẫn còn.</p>';
							echo '<p style="color: #FF6347;"> Số lượng quý khách có thể đặt tối đa hiện tại là:  '.$row['amount'].'</p>';
						}
					?>
                </div>
            </div>
            <div class="Mua">
            	<div class="add"  style="margin-right: 30px;"><a href="index.php"><input type="submit" name ="sellNow" value="Quay lại"/></a></div>
                <div class="Muanow"><input type="submit" name="add_to_cart" value="Thêm vào giỏ hàng" /></div>
            </div>
         </div>
		<input type="hidden" name="hidden_name" value="<?php echo $row["name"]; ?>" />
		<input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>" />
		<input type="hidden" name="hidden_image" value="<?php echo $row["image"]; ?>" />
		</form>
    </div>
    <div class="infosp2">
    	<div > 
        	<div class="titlechitiet"> 
            	<span>Mô Tả Sản Phẩm </span>
            </div>
            <div class="motasanpham">
			<?php echo '<pre>		'.$row['detail'].'</pre>';}}?>
          </div>
        </div>
    </div>
    <!-- : Content - Start :-->
	<!--==============================!>
	   <?php include 'footer.php';?>
	<!--==============================
	                 Footer
	===============================-->
    <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
</body>
</html>
