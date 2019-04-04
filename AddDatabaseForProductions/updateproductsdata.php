<!DOCTYPE HTML>
<html>
<head>
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
			height: 840px;
			background: #E1E5E4;
			position:absolute;
			bottom: 600px;
			border:0px;
			display: block;
			z-index:1000;
			margin-left: 10px;
		}
		h3 {
			font-size: 20px;
			font-weight: 600;
			margin-top:20px;
			margin-bottom: 20px;
		}
		h2{
			display: inline-block;
		}
		.comeback{
			display: inline-block;
			padding: 5px 10px;
			font-size: 20px;
			color: blue;
		}
		.container p {
			font-size: 18px;
			font-weight: 500;
			margin-bottom: 20px;
		}
		#detail{
			height: 200px;
			text-align: top;
		}
		.regisFrm{
			margin-top:20px;
		}
		input[type="number"]{
			margin-top: 20px;
			margin-left:10px;
			width:250px;
			height:45px;
			font-size:15px;	
			margin-bottom:20px;
			padding-left:10px;
			border:1px solid #CCC;
			border-radius: 10px;
		}
		.btn{
			color: #FFF;
			width:80px;
			height:45px;
			font-size:15px;	
			margin-bottom:20px;
			padding-left:10px;
			border:1px solid #CCC;
			border-radius: 10px;
			background-color: #2196F3;
			margin-right: 20px;
		}
		.btn:hover {
			background-color: #055d54;
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
	
	<?php
		$servername = "localhost";
		$username="root";
		$password="";
		$dbname="databaseproduction";
		$id="";
		$name="";
		$code="";
		$image="";
		$price="";
		$amount="";
		$detail="";
		
		mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
		
		//connect to mysql database
		try{
			$conn =mysqli_connect($servername,$username,$password,$dbname);
		}catch(MySQLi_Sql_Exception $ex){
			echo("error in connecting");
		}
		
		//get data from the form
		function getData(){
			$data = array();
			$data[0]=$_POST['id'];
			$data[1]=$_POST['name'];
			$data[2]=$_POST['code'];
			$data[3]=$_POST['image'];
			$data[4]=$_POST['price'];
			$data[5]=$_POST['amount'];
			$data[6]=$_POST['detail'];
			return $data;
		}
		
		//search
		if(isset($_POST['search'])){
			$info = getData();
			$search_query="SELECT * FROM 'productions' WHERE id = '$info[0]'";
			$search_result=mysqli_query($conn, $search_query);
			if($search_result){
				if(mysqli_num_rows($search_result)){
					while($rows = mysqli_fetch_array($search_result)){
						$id = $rows['id'];
						$name = $rows['name'];
						$code = $rows['code'];
						$image = $rows['image'];
						$price = $rows['price'];
						$amount = $rows['amount'];
						$detail = $rows['detail'];
					}
				}else{
					echo("no data are available");
				}
			} else{
				echo("result error");
			}
		}
		
		//delete
		if(isset($_POST['delete'])){
			$info = getData();
			$delete_query = "DELETE FROM `productions` WHERE id = '$info[0]'";
			try{
				$delete_result = mysqli_query($conn, $delete_query);
				if($delete_result){
					if(mysqli_affected_rows($conn)>0)
					{
						echo("data deleted");
					}else{
						echo("data not deleted");
					}
				}
			}catch(Exception $ex){
				echo("error in delete".$ex->getMessage());
			}
		}
		
		//edit
		if(isset($_POST['update'])){
			$info = getData();
			$update_query="UPDATE `productions` SET `name`='$info[1]',code='$info[2]',image='$info[3]',price='$info[4]',amount='$info[5]',detail='$info[6]' WHERE id = '$info[0]'";
			try{
				$update_result=mysqli_query($conn, $update_query);
				if($update_result){
					if(mysqli_affected_rows($conn)>0){
						echo("data updated");
					}else{
						echo("data not updated");
					}
				}
			}catch(Exception $ex){
				echo("error in update".$ex->getMessage());
			}
		}
	?>
</head>
<body>
<div class="managementsPro">
	<div class="container">
		<input type="number" name="id" placeholder="Tìm kiếm sản phẩm qua id" value="<?php echo($id);?>">
		<input type="submit" class="btn" name="search" value="Tìm kiếm">
		<center><h3>Cập nhật, xóa bỏ hàng hóa</h3></center>
		<div class="regisFrm">
			<form action="" method="post" enctype="multipart/form-data">
				<input type="text" name="name" placeholder="Nhập tên sản phẩm" value="<?php echo($name);?>">
				<input type="text" name="code" placeholder="Nhập tên mã số code sản phẩm" value="<?php echo($code);?>">
				<input type="text" name="image" placeholder="Thêm hình ảnh sản phẩm" value="<?php echo($image);?>">
				<input type="text" name="price" placeholder="Nhập giá sản phẩm" value="<?php echo($price);?>">
				<input type="text" name="amount" placeholder="Nhập số lượng sản phẩm" value="<?php echo($amount);?>">
				<textarea type="text" name="detail" value="<?php echo($detail);?>"> Mô tả sản phẩm ...</textarea>
				<div class="send-button">
					<input type="submit" class="button" name="update" value="Cập nhật">
					<input type="submit" class="button" name="delete" value="Xóa">
				</div>
			</form>
		</div>
	</div>
</div>
<div class="showPro">
	<a href="http://localhost/Project_Web/test1/AddDatabaseForProductions/managementProductions.php"class="comeback">Quay lại</a>
	<center><h2>Thông tin cập nhật, xóa bỏ hàng hóa trong kho</h2></center>
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