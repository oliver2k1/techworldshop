<?php include 'inc/header.php'; ?>
<?php if(isset ($_GET['catid']) || ($_GET['catid']!=NULL)){
	$id = $_GET['catid'];
}
else {
	echo "<script>window.location ='404.php'</script>";
}
// if($_SERVER['REQUEST_METHOD']=='POST'){
// 	$catName = $_POST['catName'];
// 	$updateCat = $cat->update_category($catName,$id);}
?>
 <div class="main">
    <div class="content">
    	<div class="content_top">
		<?php
				$namecat = $cat->get_name_by_cat($id);
				if($namecat){
					while($result = $namecat->fetch_assoc()){
		?>
    		<div class="heading">
    		<h3>Sản phẩm mới nhất của <?php echo $result['catName']; ?></h3>
    		</div>
		<?php }} ?>	
    		<div class="clear"></div>
    	</div>
	      <div class="section group">
			<?php
				$productbycat = $cat->get_product_by_cat($id);
				if($productbycat){
					while($result = $productbycat->fetch_assoc()){
			?>
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="details-3.php"><img src="admin/upload/<?php echo $result['image'];?>" alt="" /></a>
					 <h2><?php echo $result['productName'];?></h2>
					 <p><?php echo $fm->textShorten($result['productDes'],50);?></p>
					 <p><span class="price"><?php echo $result['price'].' VND';?></span></p>
				     <div class="button"><span><a href="details.php?proid=<?php echo $result['productId'];?>" class="details">Chi tiết</a></span></div>
				</div>
			<?php }} ?>	
			</div>
		</div>
 </div>
<?php
 include 'inc/footer.php';
?>