<?php
include 'inc/header.php';
?>
<?php 
	    if(isset ($_GET['proid']) || ($_GET['proid']!=NULL)){
			$id = $_GET['proid'];
		}
		else {
			echo "<script>window.location ='404.php'</script>";
		}
		if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['submit'])){
			$quantity = $_POST['quantity'];
			$addtocart = $ct->add_to_cart($quantity, $id);
		}
?>
<div class="main">
    <div class="content">
    	<div class="section group">
		<?php 
			$product_details = $product->product_details($id);
			if($product_details){
				while($result = $product_details->fetch_assoc()){
		?>
				<div class="cont-desc span_1_of_2">				
					<div class="grid images_3_of_2">
						<img src="admin/upload/<?php echo $result['image']; ?>" alt="" />
					</div>
				<div class="desc span_3_of_2">
				<h2><?php echo $result['productName']; ?> </h2>	
					<p><?php echo $result['productDes'];?></p>	
					<div class="price">
						<p>Price: <span><?php echo $result['price'].'VND'; ?></span></p>
						<p>Category: <span><?php echo $result['catName']; ?></span></p>
						<p>Brand:<span><?php echo $result['brandName']; ?></span></p>
					</div>
				<div class="add-cart">
					<form action="" method="POST">
						<input type="number" class="buyfield" name="quantity" value="1" min="1"/>
						<input type="submit" class="buysubmit" name="submit" value="Buy Now"/>
					</form>	
					<?php 
						if(isset($add_to_cart)){
							echo $add_to_cart;
						}
					?>			
				</div>
				
			</div>
			<div class="product-desc">
			<h2>Product Details</h2>
			<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
	        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
	    </div>			
	</div>
				<div class="rightsidebar span_3_of_1">
					<h2>CATEGORIES</h2>
					<ul>
					<?php $getall_category = $cat->show_category_frontend();
					if($getall_category){
						while($result_allcat = $getall_category->fetch_assoc()){
					?>	
				      <li><a href="productbycat.php?catid=<?php echo $result_allcat['catId'];?>"><?php echo $result_allcat['catName'] ?></a></li>
					<?php }} ?>
    				</ul>
    	
 				</div>
				 <?php  }} ?>	
 		</div>
 	</div>
	</div>
<?php
 include 'inc/footer.php';
?>