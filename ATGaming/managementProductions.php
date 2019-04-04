<?php
session_start();
$sessData = !empty($_SESSION['sessData'])?$_SESSION['sessData']:'';
if(!empty($sessData['status']['msg'])){
    $statusMsg = $sessData['status']['msg'];
    $statusMsgType = $sessData['status']['type'];
    unset($_SESSION['sessData']['status']);
}
?>
<!DOCTYPE HTML>
<html>
<style>
		.managementsPro{
			float: left;
		}
		.showPro{
			float: right;
		}
		.container {
			top: 10px;
			width: 380px;
			height: 1200px;
			background: #E1E5E4  ;
			position:absolute;
			bottom: 600px;
			border:0px;
			display: block;
			z-index:1000;
			margin-left: 1px;
		}
		h3 {
			font-size: 20px;
			font-weight: 600;
			margin-top:20px;
			margin-bottom: 20px;
		}
		.container p {
			font-size: 18px;
			font-weight: 500;
			margin-bottom: 20px;
		}
		#detail{
			height: 150px;
			text-align: top;
		}
		.regisFrm{
			margin-top:20px;
		}
		.regisFrm input {
			margin-left:10px;
			width:350px;
			height:45px;
			font-size:15px;	
			margin-bottom:20px;
			padding-left:10px;
			border:1px solid #CCC;
			border-radius: 10px;
		}
		.regisFrm textarea {
			margin-left:10px;
			width:350px;
			height:200px;
			font-size:15px;	
			margin-bottom:20px;
			padding-left:10px;
			border:1px solid #CCC;
			border-radius: 10px;
		}
		#safe{
			color:#F00;		
		}
		.send-button {
			margin-top:10px;
			margin-left: 10px;
		}
		.send-button input {
			color: #FFF;
			width:140px;
			height:45px;
			font-size:15px;	
			margin-bottom:20px;
			padding-left:10px;
			border:1px solid #CCC;
			border-radius: 10px;
			background-color: #2196F3;
			margin-right: 20px;
		}
		.send-button button{
			display: inline-block;
			color: #FFF;
			width:140px;
			height:45px;
			font-size:15px;	
			margin-bottom:20px;
			padding:10px;
			border:1px solid #CCC;
			border-radius: 10px;
			background-color: #2196F3;
			margin-right: 40px;
		}
		.send-button input[type="submit"]:hover {
			background-color: #055d54;
		}
		table th, tr{
			padding: 10px;
			text-align: center;
		}
		a.logout{float: right;}
		p.success{color:#34A853;}
		p.error{color:#EA4335;}
		
		
	</style>
<body>
<div class="managementsPro">
	<div class="container">
		<center><h3>Nhập thêm sản phẩm vào database</h3></center>
		<?php echo !empty($statusMsg)?'<center><p class="'.$statusMsgType.'">'.$statusMsg.'</p></center>':''; ?>
		<div class="regisFrm">
			<form action="addProductsIntoDataB.php" method="post" enctype="multipart/form-data">
				<input type="text" name="name" placeholder="Nhập tên sản phẩm" required="">
				<input type="text" name="code" placeholder="Nhập tên mã số code sản phẩm" required="">
				<input type="text" name="image" placeholder="Thêm hình ảnh sản phẩm" required="">
				<input type="text" name="price" placeholder="Nhập giá sản phẩm" required="">
				<input type="text" name="amount" placeholder="Nhập số lượng sản phẩm" required="">
				<input type="text" name="image1" placeholder="Thêm hình ảnh phụ 1">
				<input type="text" name="image2" placeholder="Thêm hình ảnh phụ 2">
				<input type="text" name="image3" placeholder="Thêm hình ảnh phụ 3">
				<input type="text" name="image4" placeholder="Thêm hình ảnh phụ 4">
				<input type="text" name="image5" placeholder="Thêm hình ảnh phụ 5">
				<textarea type="text" name="detail" required="" >Mô tả sản phẩm ...</textarea>
				<div class="send-button">
					<input type="submit" name="addSubmit" value="Thêm sản phẩm">
					<a href="updateproductsdata.php"<button class="btn">Update | Delete | Find</button></a>
				</div>
				<a href="index.php" style="margin-left: 20px;">Quay lại</a>
			</form>
		</div>
	</div>
</div>
<div class="showPro">
	<center><h2>Thông tin sản phẩm còn trong kho</h2></center>
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

		$sql = "SELECT * FROM productions";
		$result = $conn->query($sql);

		echo "<table border='1'>
		<tr>
		<th>ID</th>
		<th>Tên sản phẩm</th>
		<th>Mã số code</th>
		<th>Hình ảnh</th>
		<th>Giá sản phẩm</th>
		<th>Số lượng</th>
		<th>Mô tả sản phẩm</th>
		<th>Ngày nhập hàng</th>
		</tr>";

		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {
				echo "<tr>";
				echo "<td>" . $row['id'] . "</td>";
				echo "<td>" . $row['name'] . "</td>";
				echo "<td>" . $row['code'] . "</td>";
				echo "<td>" . $row['image'] . "</td>";
				echo "<td>" . $row['price'] . "</td>";
				echo "<td>" . $row['amount'] . "</td>";
				if(strlen($row['detail']) > 20){
					echo "<td>" .substr($row['detail'], 0, 20).'...' . "</td>";
				}else{
					echo "<td>" . $row['detail'] . "</td>";
				}
				echo "<td>" . $row['created'] . "</td>";
				echo "</tr>";
			}
		} else {
			echo "0 results";
		}
		$conn->close();
	?>
</div>
</body>
</html>