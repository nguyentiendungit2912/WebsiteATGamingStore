<?php
//start session
session_start();
//load and initialize product class
include 'product.php';
$product = new Product();
if(isset($_POST['addSubmit'])){
    //check whether product details are empty
    if(!empty($_POST['name']) && !empty($_POST['image']) && !empty($_POST['code']) && !empty($_POST['price'])&& !empty($_POST['amount']) && !empty($_POST['detail'])){
        //check whether product exists in the database
        $prevCon['where'] = array('code'=>$_POST['code']);
        $prevCon['return_type'] = 'count';
        $prevproduct = $product->getRows($prevCon);
        if($prevproduct > 0){
            $sessData['status']['type'] = 'error';
            $sessData['status']['msg'] = 'Mã số code của sản phẩm đã tồn tại, vui lòng nhập đúng mã số code của sản phẩm này.';
        }else{
				/*if(getimagesize($_FILES['image']['tmp_name'])==FALSE){
					echo " error ";
				}
				else{
					$image = $_FILES['image']['tmp_name'];
					$image = addslashes(file_get_contents($image));
				}*/
			//insert product data in the database
            $productData = array(
				'name' => $_POST['name'],
				'code' => $_POST['code'],
				'image' => $_POST['image'],
				'price' => $_POST['price'],
				'amount' => $_POST['amount'],
				'detail' => $_POST['detail']
			);
            $insert = $product->insert($productData);
            //set status based on data insert
            if($insert){
                $sessData['status']['type'] = 'success';
                $sessData['status']['msg'] = 'Thêm sản phẩm thành công.';
            }else{
                $sessData['status']['type'] = 'error';
                $sessData['status']['msg'] = 'Xảy ra sự cố, vui lòng thử lại.';
            }
        }
    }else{
        $sessData['status']['type'] = 'error';
        $sessData['status']['msg'] = 'Tất cả các trường là bắt buộc, vui lòng điền đầy đủ thông tin vào các trường.'; 
    }
    //store signup status into the session
    $_SESSION['sessData'] = $sessData;
    //redirect to the home/registration page
    header("Location:managementProductions.php");
}
?>