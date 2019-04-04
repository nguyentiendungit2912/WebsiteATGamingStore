<?php
session_start();
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
			width: 550px;
			height: 600px;
			background: #FFF;
			position:absolute;
			top:50px;
			left:28%;
			bottom: 600px;
			border:0px;
			display: block;
			z-index:1000;
			border:4px solid #F93;
			border-radius: 6px;
		}
		h2 {
			font-size: 30px;
			font-weight: 600;
			margin-top:20px;
			margin-bottom: 20px;
		}
		.container p {
			font-size: 18px;
			font-weight: 500;
			margin-bottom: 20px;
		}
		.regisFrm{
			margin-top:20px;
		}
		.regisFrm input {
			margin-left:50px;
			width:420px;
			height:45px;
			font-size:15px;	
			margin-bottom:20px;
			padding-left:10px;
			border:1px solid #CCC;
			border-radius: 10px;
		}
		#safe{
			color:#F00;		
		}
		#checkbox{
			margin-top:7px;		
		}
		#checkbox input{
			margin-left:50px;
			width:20px;
			height:20px;
			font-size:15px;	
			margin-bottom:20px;
			padding-left:10px;
			border:1px solid #CCC;
			border-radius: 10px;	
		}
		#checkbox span{
			font-size:17px;	
		}
		.send-button {
			margin-top:25px;
			margin-left: 20px;
		}
		.send-button input {
			color: #FFF;
			margin-left:50px;
			width:140px;
			height:45px;
			font-size:15px;	
			margin-bottom:20px;
			padding-left:10px;
			border:1px solid #CCC;
			border-radius: 10px;
		}
		.send-button input[type="submit"]{
			margin-left:100px;
			background-color: #2196F3;
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
	</style>
</head>
<body>

<div class="container">
    <center><h2>Đăng ký tài khoản</h2></center>
    <?php echo !empty($statusMsg)?'<center><p class="'.$statusMsgType.'">'.$statusMsg.'</p></center>':''; ?>
    <div class="regisFrm">
        <form action="userAccount.php" method="post">
            <input type="text" name="name" placeholder="Tên đăng nhập*" required="">
            <input type="email" name="email" placeholder="Email*" required="">
            <input type="text" name="phone" placeholder="Số điện thoại*" required="">
            <input type="password" name="password" placeholder="Mật khẩu*" required="">
            <input type="password" name="confirm_password" placeholder="Xác nhận mật khẩu*" required="">
            <div id="checkbox"> 
				<input type="checkbox" id="checkbox"><span>Đồng ý với các <span id="safe">Điều khoản dịch vụ và chính sách bảo mật</span></span>
			</div>
			<div class="send-button">
				<a href="login.php"><input type="button" value="Quay Lại"></a>
                <input type="submit" name="signupSubmit" value="Đăng ký">
            </div>
        </form>
    </div>
</div>
</body>
</html>