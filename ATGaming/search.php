<!DOCTYPE HTML>
<html>
<head>
	<style>
	.showTotalResult{
		margin-top: 30px;
		margin-bottom: 30px;
		color: #000;
		background-color: #fff;
		text-align: center;
	}
	.splineInSearch{
		height:auto;
		text-align: center;
		margin-left: 130px;
	}
	.splineInSearch .spInSearch{
		display:inline-block;
		margin-right:10px;
		margin-bottom:10px;
		float: left;
	}
	.spInSearch{
		border:1px solid #191919;
		width:210px;;
	}
	.imgspInSearch img{
		width:100%;
		height:160px;
	}
	.spInSearch div{
		text-align:center;
		padding:2px;
	}
	.spInSearch .namespInSearch{
		font-size: 13px;
		font-weight:bold;
	}
	.spInSearch .costspInSearch{
		font-size: 13px;
		font-weight:bold;
		color:#F00;
	}
	.spInSearch .infospInSearch input{
		margin-top: 2px;
		width:80px;
		height:30px;
		right: 0;
		color:#fff;
		background-color:#000;
		font-size: 13px;
		font-weight:bold;
		border-radius:10px;
	}

	.spInSearch .infospInSearch a{
		font-size: 13px;
		padding: 0;
		margin-right: 15px;
	}
	</style>
</head>
<body>
	<?php include('introduction.php');?>
	<?php
	$db = new mysqli("localhost", "root", "", "databaseproduction");
	if(isset($_GET['typeahead'])){
		$keywords = $db->escape_string($_GET['typeahead']);
		$query = $db->query("
			SELECT id, name, price, code, image FROM productions WHERE name LIKE '%{$keywords}%' OR price LIKE '%{$keywords}%' OR code LIKE '%{$keywords}%'
		");
	?>
	<div class = "result-count">
		<h4 class="showTotalResult">Đã tìm thấy <?php echo $query->num_rows;?> sản phẩm như yêu cầu của bạn.</h4>
	</div>
	<?php
		if($query->num_rows){
			while($r = $query->fetch_object()){
				?>
				<div class="splineInSearch">
					<div class="spInSearch"> 
						<div>
							<div class="imgspInSearch">
								<img src="<?php echo $r->image;?>"><br>
							</div>
							<div class="namespInSearch">
								<span><?php echo $r->name;?></span><br>
							</div>
							<div class="costspInSearch">
								<span><?php echo $r->price;?></span>
							</div>
							<div class="infospInSearch">
								<a href="Webpage_Review.php?id=<?php echo $r->id;?>">Xem chi tiết</a>
								<input type='button' value='Mua Hàng' onClick="window.location='Webpage_Muahang.php'">
							</div>
						</div>
					</div>
				</div>
				<?php
			}
		}
	}
?>
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
</body>
</html>