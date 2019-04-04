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
			if(!empty($_POST['hidden_name2']) && !empty($_POST['hidden_price2']) && empty($_POST['hidden_name3']) && empty($_POST['hidden_price3'])){
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
					'nameOfProduct1' => $_POST['hidden_name1'],
					'priceOfProduct1' => $_POST['hidden_price1'],
					'nameOfProduct2' => $_POST['hidden_name2'],
					'priceOfProduct2' => $_POST['hidden_price2']
				);
			}else if(!empty($_POST['hidden_name3']) && !empty($_POST['hidden_price3']) && empty($_POST['hidden_name4']) && empty($_POST['hidden_price4'])){
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
					'nameOfProduct1' => $_POST['hidden_name1'],
					'priceOfProduct1' => $_POST['hidden_price1'],
					'nameOfProduct2' => $_POST['hidden_name2'],
					'priceOfProduct2' => $_POST['hidden_price2'],
					'nameOfProduct3' => $_POST['hidden_name3'],
					'priceOfProduct3' => $_POST['hidden_price3']
				);
			}else if(!empty($_POST['hidden_name4']) && !empty($_POST['hidden_price4']) && empty($_POST['hidden_name5']) && empty($_POST['hidden_price5'])){
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
					'nameOfProduct1' => $_POST['hidden_name1'],
					'priceOfProduct1' => $_POST['hidden_price1'],
					'nameOfProduct2' => $_POST['hidden_name2'],
					'priceOfProduct2' => $_POST['hidden_price2'],
					'nameOfProduct3' => $_POST['hidden_name3'],
					'priceOfProduct3' => $_POST['hidden_price3'],
					'nameOfProduct4' => $_POST['hidden_name4'],
					'priceOfProduct4' => $_POST['hidden_price4']
				);
			}else if(!empty($_POST['hidden_name5']) && !empty($_POST['hidden_price5']) && empty($_POST['hidden_name6']) && empty($_POST['hidden_price6'])){
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
					'nameOfProduct1' => $_POST['hidden_name1'],
					'priceOfProduct1' => $_POST['hidden_price1'],
					'nameOfProduct2' => $_POST['hidden_name2'],
					'priceOfProduct2' => $_POST['hidden_price2'],
					'nameOfProduct3' => $_POST['hidden_name3'],
					'priceOfProduct3' => $_POST['hidden_price3'],
					'nameOfProduct4' => $_POST['hidden_name4'],
					'priceOfProduct4' => $_POST['hidden_price4'],
					'nameOfProduct5' => $_POST['hidden_name5'],
					'priceOfProduct5' => $_POST['hidden_price5']
				);
			}else if(!empty($_POST['hidden_name6']) && !empty($_POST['hidden_price6']) && empty($_POST['hidden_name7']) && empty($_POST['hidden_price7'])){
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
					'nameOfProduct1' => $_POST['hidden_name1'],
					'priceOfProduct1' => $_POST['hidden_price1'],
					'nameOfProduct2' => $_POST['hidden_name2'],
					'priceOfProduct2' => $_POST['hidden_price2'],
					'nameOfProduct3' => $_POST['hidden_name3'],
					'priceOfProduct3' => $_POST['hidden_price3'],
					'nameOfProduct4' => $_POST['hidden_name4'],
					'priceOfProduct4' => $_POST['hidden_price4'],
					'nameOfProduct5' => $_POST['hidden_name5'],
					'priceOfProduct5' => $_POST['hidden_price5'],
					'nameOfProduct6' => $_POST['hidden_name6'],
					'priceOfProduct6' => $_POST['hidden_price6']
				);
			}else if(!empty($_POST['hidden_name7']) && !empty($_POST['hidden_price7']) && empty($_POST['hidden_name8']) && empty($_POST['hidden_price8'])){
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
					'nameOfProduct1' => $_POST['hidden_name1'],
					'priceOfProduct1' => $_POST['hidden_price1'],
					'nameOfProduct2' => $_POST['hidden_name2'],
					'priceOfProduct2' => $_POST['hidden_price2'],
					'nameOfProduct3' => $_POST['hidden_name3'],
					'priceOfProduct3' => $_POST['hidden_price3'],
					'nameOfProduct4' => $_POST['hidden_name4'],
					'priceOfProduct4' => $_POST['hidden_price4'],
					'nameOfProduct5' => $_POST['hidden_name5'],
					'priceOfProduct5' => $_POST['hidden_price5'],
					'nameOfProduct6' => $_POST['hidden_name6'],
					'priceOfProduct6' => $_POST['hidden_price6'],
					'nameOfProduct7' => $_POST['hidden_name7'],
					'priceOfProduct7' => $_POST['hidden_price7']
				);
			}else if(!empty($_POST['hidden_name8']) && !empty($_POST['hidden_price8']) && empty($_POST['hidden_name9']) && empty($_POST['hidden_price9'])){
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
					'nameOfProduct1' => $_POST['hidden_name1'],
					'priceOfProduct1' => $_POST['hidden_price1'],
					'nameOfProduct2' => $_POST['hidden_name2'],
					'priceOfProduct2' => $_POST['hidden_price2'],
					'nameOfProduct3' => $_POST['hidden_name3'],
					'priceOfProduct3' => $_POST['hidden_price3'],
					'nameOfProduct4' => $_POST['hidden_name4'],
					'priceOfProduct4' => $_POST['hidden_price4'],
					'nameOfProduct5' => $_POST['hidden_name5'],
					'priceOfProduct5' => $_POST['hidden_price5'],
					'nameOfProduct6' => $_POST['hidden_name6'],
					'priceOfProduct6' => $_POST['hidden_price6'],
					'nameOfProduct7' => $_POST['hidden_name7'],
					'priceOfProduct7' => $_POST['hidden_price7'],
					'nameOfProduct8' => $_POST['hidden_name8'],
					'priceOfProduct8' => $_POST['hidden_price8']
				);
			}else if(!empty($_POST['hidden_name9']) && !empty($_POST['hidden_price9']) && empty($_POST['hidden_name10']) && empty($_POST['hidden_price10'])){
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
					'nameOfProduct1' => $_POST['hidden_name1'],
					'priceOfProduct1' => $_POST['hidden_price1'],
					'nameOfProduct2' => $_POST['hidden_name2'],
					'priceOfProduct2' => $_POST['hidden_price2'],
					'nameOfProduct3' => $_POST['hidden_name3'],
					'priceOfProduct3' => $_POST['hidden_price3'],
					'nameOfProduct4' => $_POST['hidden_name4'],
					'priceOfProduct4' => $_POST['hidden_price4'],
					'nameOfProduct5' => $_POST['hidden_name5'],
					'priceOfProduct5' => $_POST['hidden_price5'],
					'nameOfProduct6' => $_POST['hidden_name6'],
					'priceOfProduct6' => $_POST['hidden_price6'],
					'nameOfProduct7' => $_POST['hidden_name7'],
					'priceOfProduct7' => $_POST['hidden_price7'],
					'nameOfProduct8' => $_POST['hidden_name8'],
					'priceOfProduct8' => $_POST['hidden_price8'],
					'nameOfProduct9' => $_POST['hidden_name9'],
					'priceOfProduct9' => $_POST['hidden_price9']
				);
			}else if(!empty($_POST['hidden_name10']) && !empty($_POST['hidden_price10'])){
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
					'nameOfProduct1' => $_POST['hidden_name1'],
					'priceOfProduct1' => $_POST['hidden_price1'],
					'nameOfProduct2' => $_POST['hidden_name2'],
					'priceOfProduct2' => $_POST['hidden_price2'],
					'nameOfProduct3' => $_POST['hidden_name3'],
					'priceOfProduct3' => $_POST['hidden_price3'],
					'nameOfProduct4' => $_POST['hidden_name4'],
					'priceOfProduct4' => $_POST['hidden_price4'],
					'nameOfProduct5' => $_POST['hidden_name5'],
					'priceOfProduct5' => $_POST['hidden_price5'],
					'nameOfProduct6' => $_POST['hidden_name6'],
					'priceOfProduct6' => $_POST['hidden_price6'],
					'nameOfProduct7' => $_POST['hidden_name7'],
					'priceOfProduct7' => $_POST['hidden_price7'],
					'nameOfProduct8' => $_POST['hidden_name8'],
					'priceOfProduct8' => $_POST['hidden_price8'],
					'nameOfProduct9' => $_POST['hidden_name9'],
					'priceOfProduct9' => $_POST['hidden_price9'],
					'nameOfProduct10' => $_POST['hidden_name10'],
					'priceOfProduct10' => $_POST['hidden_price10']
				);
			}else{
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
					'nameOfProduct1' => $_POST['hidden_name1'],
					'priceOfProduct1' => $_POST['hidden_price1']
				);
			}
            
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
    header("Location:index.php");
}
?>