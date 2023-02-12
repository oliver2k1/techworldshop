<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/brand.php';?>
<?php include '../classes/category.php';?>
<?php include '../classes/product.php';?>
<?php include_once '../helper/format.php';?>
<?php $fm = new Format(); 
	  $pd = new product(); 
	  if(isset ($_GET['productid'])){
		$id = $_GET['productid'];
		$delpro = $pd->del_product($id);
	}	  
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Post List</h2>
        <div class="block">  
			<?php if(isset($delpro)){
				echo $delpro;
			} ?>
            <table class="data display datatable" id="example">
			<thead>
				<tr>
					<th>ID</th>
					<th>Tên sản phẩm</th>
					<th>Ảnh sản phẩm</th>
					<th>Giá</th>
					<th>Danh mục</th>
					<th>Thương hiệu</th>
					<th>Mô tả</th>
					<th>Loại</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$pd = new product();
				$pdlist = $pd->show_product();
				if ($pdlist) {
					$i = 0;
					while ($result = $pdlist->fetch_assoc()) {
						$i++;
					?>
				<tr class="odd gradeX">
					<td><?php echo $i ?></td>
					<td><?php echo $result['productName']?></td>
					<td><img src="upload/<?php echo$result['image']?>" width="80"></td>
					<td> <?php echo$result['price']?></td>
					<td> <?php echo$result['catName']?></td>
					<td> <?php echo$result['brandName']?></td>
					<td> <?php echo$fm->textShorten($result['productDes'],10)?></td>
					<td> <?php 
					if($result['type']==1){	
						echo 'Featured';
					}else{
						echo 'Non-Featured';
					}
					?></td>
					<td><a href="productedit.php?productid=<?php echo $result['productId'] ?>">Edit</a> || <a onclick = "return confirm('Are you want to delete?')" href="?productid=<?php echo $result['productId'] ?>">Delete</a></td>
				</tr>
				<?php }
				} ?>
			</tbody>
		</table>

       </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        setupLeftMenu();
        $('.datatable').dataTable();
		setSidebarHeight();
    });
</script>
<?php include 'inc/footer.php';?>