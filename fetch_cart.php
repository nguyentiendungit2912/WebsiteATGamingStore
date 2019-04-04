<?php

//fetch_cart.php

session_start();

$total_price = 0;
$total_item = 0;

$output = '
<div class="table-responsive" id="order_table">
	<table class="table table-bordered">
				<tr class="showproCarted">
					<th width="21%"><center>Tên sản phẩm</center></th>
					<th width="20%"><center>Hình sản phẩm</center></th>
					<th width="10%"><center>Số lượng</center></th>
					<th width="22%"><center>Giá sản phẩm</center></th>
					<th width="22%"><center>Tổng tiền</center></th>
					<th width="5%"></th>
				</tr>
';
if(!empty($_SESSION["shopping_cart"]))
{
	foreach($_SESSION["shopping_cart"] as $keys => $values)
	{
		$output .= '
		
		<tr style="border: 0px; background-color: #D8DCD8;">
					<td style="border: 0px;"><span class="shownamePro"><center>'.$values["product_name"].'</center></span></td>
					<td style="border: 0px;"><span class="showimagePro"><center><img src="'.$values["product_image"].'" style="width: 50px; height: 50px;"></center></span></td>
					<td style="border: 0px;"><span class="showquantityPro"><center>'.$values["product_quantity"].'</center></span></td>
					<td style="border: 0px;"><span class="showpricePro"><center>'.$values["product_price"].' VNĐ</center></span></td>
					<td style="border: 0px;"><span class="showTotalpricePro"><center>'.number_format($values["product_quantity"] * $values["product_price"], 2).' VNĐ</center></span></td>
					<td><button name="delete" class="btn btn-danger btn-xs delete" id="'. $values["product_id"].'">Remove</button></td>
				</tr>
		
		
		';
		$total_price = $total_price + ($values["product_quantity"] * $values["product_price"]);
		$total_item = $total_item + 1;
	}
	$output .= '
	<tr>  
        <td colspan="3" align="right">Total</td>  
        <td align="right">$ '.number_format($total_price, 2).'</td>  
        <td></td>  
    </tr>
	';
}
else
{
	$output .= '
    <tr>
    	<td colspan="5" align="center">
    		Your Cart is Empty!
    	</td>
    </tr>
    ';
}
$output .= '</table></div>';
$data = array(
	'cart_details'		=>	$output,
	'total_price'		=>	'$' . number_format($total_price, 2),
	'total_item'		=>	$total_item
);	

echo json_encode($data);


?>