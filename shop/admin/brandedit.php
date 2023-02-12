<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/brand.php';?>
<?php
    if(isset ($_GET['brandid']) || ($_GET['brandid']!=NULL)){
        $id = $_GET['brandid'];
    }
    else {
        echo "<script>window.location ='brandlist.php'</script>";
    }
    $cat = new brand();
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $brandName = $_POST['brandName'];
        $updatebrand = $cat->update_brand($brandName,$id);
    }
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Sửa thương hiệu</h2>
               <div class="block copyblock">
                <?php 
                if(isset($updatebrand)){
                    echo $updatebrand;
                }
                ?> 
                <?php
                $get_brand_name = $cat->getbrandbyId($id);
                if($get_brand_name){
                    while($result = $get_brand_name->fetch_assoc()){
                ?>
                 <form action="" method="POST">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" value ="<?php echo $result['brandName']?>"  name="brandName" class="medium" />
                            </td>
                        </tr>
						<tr> 
                            <td>
                                <input type="submit" name="submit" Value="Update" />
                            </td>
                        </tr>
                    </table>
                    </form>
                    <?php
                    }
                }
                    ?>
                </div>
            </div>
        </div>
<?php include 'inc/footer.php';?>