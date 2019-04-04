<?php

//fetch_item.php

include('database_connection.php');

$query = "SELECT * FROM productions ORDER BY id DESC";

$statement = $connect->prepare($query);

if($statement->execute())
{
	$result = $statement->fetchAll();
	$output = '';
	foreach($result as $row)
	{
		$output .= '
		
		<div class="spline1">
			<div class="sp">
			<form method="post" action="index.php?action=add&id=<?php echo $row['id']; ?>">
				<div class="imgsp">
					<img src="'.$row["image"].'"><br>
				</div>
														
				<div class="namesp">
					<span>'.$row["name"].'</span><br>
				</div>
														
				<div class="costsp">
					<span>'.$row["price"].'</span><br>
				</div>
				<div class="infosp" style="padding-bottom: 10px; padding-top: 5px">
					<a href="Webpage_Review.php?id=' . $row["id"] .'">Xem chi tiết</a>
					<a href="#"><input type="button" name="add_to_cart" id="'.$row["id"].'" value="Mua hàng"></a>
					</div>
				<input type="hidden" name="hidden_name" id="name'.$row["id"].'" value="'.$row["name"].'"/>
				<input type="hidden" name="hidden_price" id="name'.$row["id"].'" value="'.$row["price"].'"/>
				<input type="hidden" name="hidden_image" id="name'.$row["id"].'" value="'.$row["image"].'"/>
			</form>
		</div>
	</div>
		
		
		';
	}
	echo $output;
}


?>