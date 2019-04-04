<section>
		<div id="cartBoxes" style="width: 700px; height: auto; border: 2px solid navy; border-radius: 5px; position:absolute; z-index: 1000; background-color:#FFF; top:100px; display: none; margin-left: 635px; top: 130px;">
			<table class="table table-bordered">
				<tr class="showproCarted">
					<th width="20%"><center>Tên sản phẩm</center></th>
					<th width="20%"><center>Hình sản phẩm</center></th>
					<th width="10%"><center>Số lượng</center></th>
					<th width="20%"><center>Giá sản phẩm</center></th>
					<th width="20%"><center>Tổng tiền</center></th>
					<th width="10%"></th>
				</tr>
				<?php
					if(!empty($_SESSION["shopping_cart"])){
						$total = 0;
						$total_item = 0;
						foreach($_SESSION["shopping_cart"] as $keys => $values){
				?>
				<tr>
					<td><span class="shownamePro"><center><?php echo $values["item_name"]; ?></center></span></td>
					<td><span class="showimagePro"><center><img src="<?php echo $values["item_image"]; ?>" style="width: 50px; height: 50px;"></center></span></td>
					<td><span class="showquantityPro"><center><?php echo $values["item_quantity"]; ?></center></span></td>
					<td><span class="showpricePro"><center><?php echo $values["item_price"]; ?> VNĐ</center></span></td>
					<td><span class="showTotalpricePro"><center><?php echo number_format($values["item_quantity"] * $values["item_price"], 2);?> VNĐ</center></span></td>
					<td><a href="index.php?action=delete&id=<?php echo $values["item_id"]; ?>"><span class="text-danger"><center>Xóa</center></span></a></td>
				</tr>
				<?php
						$total_item = $total_item + 1;
						$total = $total + ($values["item_quantity"] * $values["item_price"]);
					}
				?>
				<tr class="showTotalAndComeback">
					<td colspan="5" align="right"><strong> Tổng cộng : <?php echo number_format($total, 2); ?> VNĐ</strong></td>
					<td colspan="1" align="right"><a href="Webpage_Muahang.php"><input type="button" value="Mua Hàng"></a></td>
				</tr>
				<?php
					}else{
						//echo '<p style="display: inline-block; background-color: red; color: #C70039;"><center>gio hang cua ban rong</center></p>';?>
						<script>
							$(document).ready(function(){
								$("#cartBoxes").css("width", "0px");
								$("#cartBoxes").css("border", "0px");
								$(".showproCarted").css("display", "none");
							});
						</script>
						<div class="emptyCart" style="background: #fff; width: 170px; height: auto; padding: 10px; margin-left: 290px;">
							<img src="image/icon/carticon.jpg" style="width: 150px; height: 150px; margin-bottom: 10px;">
							<h6><center>Giỏ hàng trống</center><h6>
						</div>
						
					<?php }
				?>
			</table>
		</div>
	</section>