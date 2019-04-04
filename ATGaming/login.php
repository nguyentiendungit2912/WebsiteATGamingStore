<?php
if(!isset($_SESSION)){ 
    session_start(); 
} 
$sessData = !empty($_SESSION['sessData'])?$_SESSION['sessData']:'';
if(!empty($sessData['status']['msg'])){
    $statusMsg = $sessData['status']['msg'];
    $statusMsgType = $sessData['status']['type'];
    unset($_SESSION['sessData']['status']);
}
?>
<?php include 'index.php';?>
<!DOCTYPE HTML>
<html>
<head>
	<style>
		.container {
			width: 500px;
			height: 420px;
			background: #FFF;
			position:absolute;
			top:100px;
			left:28%;
			bottom: 600px;
			border:0px;
			display: block;
			z-index:1000;
			padding-top:30px;
			border:4px solid #F93;
			border-radius: 6px;
		}
		h2 {
			font-size: 30px;
			font-weight: 600;
			margin-bottom: 20px;
		}
		.container p {
			font-size: 18px;
			font-weight: 500;
			margin-bottom: 20px;
		}
		.regisFrm form{
			margin-top:30px;
		}
		.regisFrm p{
			display: block;
			margin-left: 40%;
			padding: 0px;
		}
		.regisFrm a{
			display: inline-block;
			color: red;
			font-size: 20px;
			text-decoration:none;
		}
		.regisFrm form input{
			width:420px;
			height:45px;
			font-size:15px;	
			margin-bottom:20px;
			padding-left:10px;
			border:1px solid #CCC;
			border-radius: 10px;
		}
		.regisFrm form input[type="text"], .regisFrm input[type="email"], .regisFrm input[type="password"] {
			margin-left: 30px;
		}
		.send-button {
			text-align: center;
			margin-top: 20px;
		}
		.send-button input[type="button"] {
			width: 100px;
		}
		.send-button input[type="submit"] {
			padding: 10px 0;
			width: 40%;
			font-family: 'Roboto', sans-serif;
			font-size: 18px;
			font-weight: 500;
			border: none;
			outline: none;
			color: #FFF;
			background-color: #2196F3;
			cursor: pointer;
			margin-left: 100px;
		}
		.send-button input[type="submit"]:hover {
			background-color: #055d54;
		}
		.send-button input[type="button"]:hover {
			background-color: #8E9392;
		}
		a.logout{float: right;}
		p.success{color:#34A853;}
		p.error{color:#EA4335;}

		.boxlogout span{
			display: block;
			color: red;
		}
		.boxlogout span:hover{
			color: blue;
		}
		
		.boxlogout p{
			display: block;
			color: gray;
			font-size: 16px;
		}
		.boxlogout p:hover{
			color: blue;
		}

	</style>
</head>
<body>
<div class="container" id="containers">
    <?php
        if(!empty($sessData['userLoggedIn']) && !empty($sessData['userID'])){
            include 'user.php';
            $user = new User();
            $conditions['where'] = array(
                'id' => $sessData['userID'],
            );
            $conditions['return_type'] = 'single';
            $userData = $user->getRows($conditions);
    ?>
	<?php echo'<style>.container{width: 36px; height: 36px; background-color: #fff; margin: 0px; padding: 5px 10px; left: 96.5%; top: 93px; border:0px; border-radius: 20px;}</style>'?>
	<div class="boxlogout" id="boxlogout">
		<a href="userAccount.php?logoutSubmit=1" class="logout"><i class="fa fa-sign-out" aria-hidden="true"></i></a>
		<script>
			//alert('Chúc mừng quý khách <?php echo $userData['name']; ?> đã đăng nhập thành công');
			document.getElementById('login').innerHTML = "<?php echo $userData['name']; ?>";
		</script>
	</div>
    <?php }else{ ?>
		<center><h2>Đăng nhập</h2></center>
		<?php echo !empty($statusMsg)?'<center><p class="'.$statusMsgType.'">'.$statusMsg.'</p></center>':''; ?>
		<div class="regisFrm">
			<form action="userAccount.php" method="post">
				<input type="email" name="email" id="username" placeholder="Email*" required="">
				<input type="password" name="password" id="passw" placeholder="Password*" required="">
				<div class="send-button">
					<a href="index.php"><input type="button" value="Quay Lại"></a>
					<input type="submit" name="loginSubmit" >
				</div>
			</form>
			<p>Bạn chưa có tài khoản? <a href="registration.php">Đăng ký</a></p>
		</div>
    <?php } ?>
</div>
</body>
</html>