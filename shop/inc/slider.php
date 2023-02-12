
	<div class="header_bottom">
		<div class="header_bottom_left">
			<div class="section group">
				<?php $getlastestTOSHIBA = $product->get_lastestTOSHIBA();
					if($getlastestTOSHIBA){
						while($result_dell = $getlastestTOSHIBA->fetch_assoc()){
				?>	
				<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						 <a href="details.php"> <img src="admin/upload/<?php echo $result_dell['image'];?>" alt="" /></a>
					</div>
				    <div class="text list_2_of_1">
						<h2>TOSHIBA</h2>
						<p><?php echo $result_dell['productName'];?></p>
						<div class="button"><span><a href="details.php">Add to cart</a></span></div>
				   </div>
				   <?php }} ?>
			   </div>
			   <?php $getlastestYAMAHA = $product->get_lastestYAMAHA();
					if($getlastestYAMAHA){
						while($result = $getlastestYAMAHA->fetch_assoc()){
				?>				
				<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						  <a href="details.php"><img src="admin/upload/<?php echo $result['image'];?>" alt="" /></a>
					</div>
					<div class="text list_2_of_1">
						  <h2>YAMAHA</h2>
						  <p><?php echo $result['productName'];?></p>
						  <div class="button"><span><a href="details.php">Add to cart</a></span></div>
					</div>
				</div>
				<?php }} ?>
			</div>
			<div class="section group">
			<?php $getlastestWAVE = $product->get_lastestWAVE();
					if($getlastestYAMAHA){
						while($result = $getlastestWAVE->fetch_assoc()){
				?>	
				<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						 <a href="details.php"> <img src="admin/upload/<?php echo $result['image'];?>" alt="" /></a>
					</div>
				    <div class="text list_2_of_1">
						<h2>WAVE</h2>
						<p><?php echo $result['productName'];?></p>
						<div class="button"><span><a href="details.php">Add to cart</a></span></div>
				   </div>
				   <?php }} ?>
			   </div>
			   <?php $getlastestTOCOTOCO = $product->get_lastestTOCOTOCO();
					if($getlastestTOCOTOCO){
						while($result_toco = $getlastestTOCOTOCO->fetch_assoc()){
				?>			
				<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						  <a href="details.php"><img src="admin/upload/<?php echo $result_toco['image'];?>" alt="" /></a>
					</div>
					<div class="text list_2_of_1">
						  <h2>TOCOCOCO</h2>
						  <p><?php echo $result_toco['productName'];?>.</p>
						  <div class="button"><span><a href="details.php">Add to cart</a></span></div>
					</div>
					<?php }} ?>
				</div>
			</div>
		  <div class="clear"></div>
		</div>
			 <div class="header_bottom_right_images">
		   <!-- FlexSlider -->
             
			<section class="slider">
				  <div class="flexslider">
					<ul class="slides">
						<li><img src="images/1.jpg" alt=""/></li>
						<li><img src="images/2.jpg" alt=""/></li>
						<li><img src="images/3.jpg" alt=""/></li>
						<li><img src="images/4.jpg" alt=""/></li>
				    </ul>
				  </div>
	      </section>
<!-- FlexSlider -->
	    </div>
	  <div class="clear"></div>
  </div>