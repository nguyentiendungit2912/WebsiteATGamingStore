<?php
//start session
session_start();
//load and initialize product class
include 'customers.php';
$product = new Product();
if(isset($_POST['dathang'])){
    //check whether product details are empty
    if(!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['phone']) && !empty($_POST['province'])&& !empty($_POST['district']) && !empty($_POST['town']) && !empty($_POST['address']) && !empty($_POST['note'])){
        
			
			//insert product data in the database
            $productData = array(
				'name' => $_POST['name'],
				'email' => $_POST['email'],
				'phone' => $_POST['phone'],
				'province' => $_POST['province'],
				'district' => $_POST['district'],
				'town' => $_POST['town'],
				'address' => $_POST['address'],
				'note' => $_POST['note'],
				'total_products' => $_POST['hidden_total_products'],
				'totalAmount' => $_POST['hidden_totalAmount'],
				'nameOfProduct1' => $_POST['hidden_name'],
				'priceOfProduct1' => $_POST['hidden_price'],
			);
            $insert = $product->insert($productData);
            //set status based on data insert
            if($insert){
                $sessData['status']['type'] = 'success';
                $sessData['status']['msg'] = 'Giao dịch thành công.';
            }else{
                $sessData['status']['type'] = 'error';
                $sessData['status']['msg'] = 'Xảy ra sự cố, vui lòng thử lại.';
            }
    }else{
        $sessData['status']['type'] = 'error';
        $sessData['status']['msg'] = 'Tất cả các trường là bắt buộc, vui lòng điền đầy đủ thông tin vào các trường.'; 
    }
    //store signup status into the session
    $_SESSION['sessData'] = $sessData;
    //redirect to the home/registration page
    header("Location:Webpage_Muahang.php");
}
?>