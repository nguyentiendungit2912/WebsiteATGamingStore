/*=============================================================
					kiểm tra đăng nhập	
==============================================================*/
/*function checkAccount(){
	var usernameAcc = document.getElementById('username').value;
	var passwordAcc = document.getElementById('password').value;
	if( (usernameAcc == "admin") && (passwordAcc == "admin")){
		document.getElementById('Signin12').style.display = 'none';
		document.getElementById('login').innerHTML = usernameAcc;
	}
	if((usernameAcc == "") || (passwordAcc == "")){
		alert("Không được để trống tài khoản hoặc mật khẩu");
	}
	else if((usernameAcc != "admin") ||(passwordAcc != "admin")){
		alert("Tài khoản hoặc mật khẩu không đúng");
	}
}

/*=============================================================
				kiểm tra số lượng hàng đặt	
==============================================================*/
function clcong(){
	var x =document.getElementById("buttontext").value;
	var y = x++;
	document.getElementById("buttontext").value=x++;
	if(x >=5){
		document.getElementById("buttontext").value=5;	 
	}
}

function cltru(){
	var x =document.getElementById("buttontext").value;
	var y = x--;
	document.getElementById("buttontext").value=x--;
	if(x <=0){
		document.getElementById("buttontext").value=0;	 
	}
}

/*=============================================================
		slide show trong trang chi tiết sản phẩm
==============================================================*/
/*window.onload = function(){
    setTimeout("switch_Image()", 3000);
 }
var current = 1;
var num_image = 4;
function switch_Image(){
    current++;
    document.images['imageqc'].src ='image/imageqc' + current + '.png';
    if(current < num_image){
		setTimeout("switch_Image()", 3000);
    }else if(current == num_image){
       current = 0;
       setTimeout("switch_Image()", 3000);
    }
}
*/
/*=============================================================
				silde show hot product
==============================================================*/
var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
	showSlides(slideIndex += n);
}

function currentSlide(n) {
	showSlides(slideIndex = n);
}

function showSlides(n) {
	var i;
	var slides = document.getElementsByClassName("mySlidesShow");
	var dots = document.getElementsByClassName("dot");
	if (n > slides.length) {slideIndex = 1}    
	if (n < 1) {slideIndex = slides.length} ;
	for (i = 0; i < slides.length; i++) {
		 slides[i].style.display = "none";  
	}
	for (i = 0; i < dots.length; i++) {
		dots[i].className = dots[i].className.replace(" active", "");
	}
	slides[slideIndex-1].style.display = "block";  
		dots[slideIndex-1].className += " active";
}

/*=============================================================
				silde show hot product
==============================================================*/
var myIndex = 0;
carousel();

function carousel() {
var i;
var x = document.getElementsByClassName("mySlides");
for (i = 0; i < x.length; i++) {
	x[i].style.display = "none";  
}
myIndex++;
if (myIndex > x.length) {myIndex = 1}    
	x[myIndex-1].style.display = "block";  
	setTimeout(carousel, 2000); // Change image every 2 seconds
}

/*=============================================================
					main sale show
==============================================================*/
var slideI = 1;
show1(slideI);

function plussectionSildeShow(np) {
	show1(slideI += np);
}

function currentsectionSildeShow(np) {
	show1(slideI = np);
}

function show1(np) {
  var tp;
  var sl1 = document.getElementsByClassName("sectionSildeShow");
  var dot1 = document.getElementsByClassName("dot");
  if (np > slides.length) {slideI = 1}    
  if (np < 1) {slideI = sl1.length} ;
  for (tp = 0; i < sl1.length; tp++) {
	sl1[tp].style.display = "none";  
  }
  for (tp = 0; i < dot1.length; tp++) {
	dot1[tp].className = dot1[tp].className.replace(" activess", "");
  }
  sl1[slideI-1].style.display = "block";  
  dot1[slideI-1].className += " activess";
}

