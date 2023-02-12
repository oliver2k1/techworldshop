<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/database.php');
include_once ($filepath.'/../helper/format.php');
?>
<?php
    class product{
        private $db;
        private $fm;

        public function __construct(){
        $this->db = new Database();
        $this->fm = new Format();
        }
        public function insert_product($data,$files){
        $productName = mysqli_real_escape_string($this->db->link, $data['productName']);  
        $brand = mysqli_real_escape_string($this->db->link, $data['brand']);  
        $category = mysqli_real_escape_string($this->db->link, $data['category']);  
        $productDes = mysqli_real_escape_string($this->db->link, $data['productDes']);  
        $price = mysqli_real_escape_string($this->db->link, $data['price']);  
        $type = mysqli_real_escape_string($this->db->link, $data['type']);
        $permited = array('jpg', 'jpeg', 'png', 'gif');
        $file_name = $_FILES['image']['name'];
        $file_size = $_FILES['image']['size'];    
        $file_temp = $_FILES['image']['tmp_name'];
        $div = explode('.', $file_name);
        $file_ext = strtolower(end($div));
        $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
        $uploaded_image = "upload/".$unique_image;
        if($productName==""||$brand==""||$category==""||$productDes==""||$type==""||$price==""||$file_name==""){
            $alert = "Fiels must be not empty";
            return $alert;
        }else{
            move_uploaded_file($file_temp, $uploaded_image);
            $query = "INSERT INTO tbl_product(productName,brandId,catId,productDes,type,price,image) VALUES ('$productName',
            '$brand','$category','$productDes','$type','$price','$unique_image')";
            $result = $this->db->insert($query);
            if($result){
                $alert = "<span class='success'> Thêm sản phẩm thành công</span>";
                return $alert;
            }else{
                $alert = "<span class='error'> Thêm sản phẩm thất bại</span>";
                return $alert;
                }
            }
        }
        public function show_product(){
            $query = "SELECT tbl_product.*, tbl_category.catName, tbl_brand.brandName FROM tbl_product INNER JOIN tbl_category ON tbl_product.catId = tbl_category.catId
            INNER JOIN tbl_brand ON tbl_product.brandId = tbl_brand.brandId ORDER BY tbl_product.productId desc";
            $result = $this->db->select($query);
            return $result;
        }
        public function getproductbyId($id){
            $query = "SELECT * FROM tbl_product WHERE productId = '$id'";
            $result = $this->db->select($query);
            return $result;
        }
        public function update_product($data,$files,$id){
        $productName = mysqli_real_escape_string($this->db->link, $data['productName']);  
        $brand = mysqli_real_escape_string($this->db->link, $data['brand']);  
        $category = mysqli_real_escape_string($this->db->link, $data['category']);  
        $productDes = mysqli_real_escape_string($this->db->link, $data['productDes']);  
        $price = mysqli_real_escape_string($this->db->link, $data['price']);  
        $type = mysqli_real_escape_string($this->db->link, $data['type']);
        $permited = array('jpg', 'jpeg', 'png', 'gif');
        $file_name = $_FILES['image']['name'];
        $file_size = $_FILES['image']['size'];    
        $file_temp = $_FILES['image']['tmp_name'];
        $div = explode('.', $file_name);
        $file_ext = strtolower(end($div));
        $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
        $uploaded_image = "upload/".$unique_image;

        if($productName==""||$brand==""||$category==""||$productDes==""||$type==""||$price==""){
            $alert = "<span class='error'> Fiels must be not empty</span>";
            return $alert;
        }
        else{
                    if(!empty($file_name)){
                        if($file_size > 40960) {
                            $alert = "Image size shoulbe less then 2MB";
                            return $alert;
                        }
        elseif (in_array($file_ext, $permited) === false)
            {
                $alert = "<span class='success'>You can't upload this file! </span>";
                return $alert;
            }  
            $query = "UPDATE tbl_product SET  productName = '$productName' , image = '$unique_image' , brandId = '$brand' , catId = '$category' , type = '$type' , price = '$price' , productDes = '$productDes' WHERE productId = '$id'"; 
            move_uploaded_file($file_temp,$uploaded_image);
            $delname="SELECT image FROM tbl_product WHERE productId='$id'";
            $delta=$this->db->select($delname);
            $string=""; 
            while($rowData=$delta->fetch_assoc()){
                $string .= $rowData['image'];
            }
            $delLink="../uploads/".$string;
            unlink($delLink);
        }else{
                $query = "UPDATE tbl_product SET  productName = '$productName' ,  brandId = '$brand' , catId = '$category' , type = '$type' , price = '$price' , productDes = '$productDes' WHERE productId = '$id'"; 
            }
            $result = $this->db->update($query);
            if($result){
                $alert = "<span class='success'> Thanh cong!</span>";
                return $alert;
            }else{
                $alert = "<span class='error'> That bai! </span>";
                return $alert;
            }
            
        } 
}
        
        public function del_product($id){
        $query = "DELETE FROM tbl_product WHERE productId = '$id'";
        $result = $this->db->delete($query);
            if($result){
                $alert = "<span class='success'>Xoa thanh cong!</span>";
                return $alert;
            }else{
                $alert = "<span class='error'>Xoa that bai! </span>";
                return $alert;
            }
        }
        //End BackEnd

        public function getproduct_feathered(){
            $query = "SELECT * FROM tbl_product WHERE type = '1'";
            $result = $this->db->select($query);
            return $result;
        }
        public function getproduct_new(){
            $query = "SELECT * FROM tbl_product ORDER BY productId desc limit 4";
            $result = $this->db->select($query);
            return $result;
        }
        public function product_details($id){
            $query = "SELECT tbl_product.*, tbl_category.catName, tbl_brand.brandName FROM tbl_product INNER JOIN tbl_category ON tbl_product.catId = tbl_category.catId
            INNER JOIN tbl_brand ON tbl_product.brandId = tbl_brand.brandId Where tbl_product.productId = '$id'";
            $result = $this->db->select($query);
            return $result;
        }
        public function get_lastestTOSHIBA(){
            $query = "SELECT * FROM tbl_product WHERE brandId = 9 order by productId desc limit 1";
            $result = $this->db->select($query);
            return $result;
        }
        public function get_lastestYAMAHA(){
            $query = "SELECT * FROM tbl_product WHERE brandId = 10 order by productId desc limit 1";
            $result = $this->db->select($query);
            return $result;
        }
        public function get_lastestWAVE(){
            $query = "SELECT * FROM tbl_product WHERE brandId = 11 order by productId desc limit 1";
            $result = $this->db->select($query);
            return $result;
        }
        public function get_lastestTOCOTOCO(){
            $query = "SELECT * FROM tbl_product WHERE brandId = 12 order by productId desc limit 1";
            $result = $this->db->select($query);
            return $result;
        }
    }                 
?>