<?php
include 'inc/header.php';
?>
<?php
if(isset ($_GET['cartId'])){
	$cartid = $_GET['cartId'];
	$delcart = $ct->del_cart($cartid);
}
if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['submit'])){
	$cartId = $_POST['cartId'];
	$quantity = $_POST['quantity'];
	$update_cart = $ct->update_cart($quantity, $cartId);
	if($quantity ==0){
		$delcart = $ct->del_cart($cartId);
	}
}
?>
<div class="main">
    <div class="content">
    	<div class="cartoption">		
			<div class="cartpage">
			    	<h2>Your Cart</h2>
					<?php 
					if(isset($update_cart)){
						echo $update_cart;
					}
					?>
					<?php 
					if(isset($delcart)){
						echo $delcart;
					}
					?>
						<table class="tblone">
							<tr>
								<th width="20%">Product Name</th>
								<th width="20%">Image</th>
								<th width="10%">Price</th>
								<th width="20%">Quantity</th>
								<th width="20%">Total Price</th>
								<th width="10%">Action</th>
							</tr>
							<?php 
								$get_product_cart = $ct->get_product_cart();
								if($get_product_cart){
									$sub_total = 0;
									while($result = $get_product_cart->fetch_assoc()){
							?>
							<tr>
								<td><?php echo $result['productName'];?></td>
								<td><img src="admin/upload/<?php echo $result['image'];?>" alt=""/></td>
								<td><?php echo $result['price'].' VND	';?></td>
								<td>
									<form action="" method="post">
										<input type="hidden" name="cartId"  value="<?php echo $result['cartId'];?>"/>
										<input type="number" name="quantity" min="0" value="<?php echo $result['quantity'];?>"/>
										<input type="submit" name="submit" value="Update"/>
									</form>
								</td>
								<td><?php (int)$total = (int)$result['price'] * (int)$result['quantity'];
								echo $total.' VND';?> </td>
								<td><a href="?cartId=<?php echo $result['cartId']?>">Xóa</a></td>
							</tr>
						<?php 	
						$sub_total = $sub_total + $total;	
							}
						} ?>	
							
						</table>
						<?php
							$check_cart = $ct->check_cart();
							if($check_cart){
						?>
						<table style="float:right;text-align:left;" width="40%">
							<tr>
								<th>Sub Total:</th>
								<td><?php
								echo $sub_total.' VND';
								Session::set('sum',$sub_total)?>
								</td>
							</tr>
							<tr>
								<th>VAT : </th>
								<td>10%</td>
							</tr>
							<tr>
								<th>Grand Total :</th>
								<td><?php 
								$vat = $sub_total * 0.1;
								$g_total = $sub_total + $vat;
								echo $g_total.' VND';
								?></td>
							</tr>
					   </table>
					   <?php }else{
							echo 'Giỏ hàng trống';
					   } ?>
					</div>
					<div class="shopping">
						<div class="shopleft">
							<a href="index.php"> <img src="images/shop.png" alt="" /></a>
						</div>
						<div class="shopright">
							<a href="login.php"> <img src="images/check.png" alt="" /></a>
						</div>
					</div>
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>
 <?php
 include 'inc/footer.php';
?>