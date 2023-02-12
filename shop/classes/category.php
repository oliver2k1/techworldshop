<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/database.php');
include_once ($filepath.'/../helper/format.php');
?>
<?php
    class category{
        private $db;
        private $fm;

        public function __construct(){
        $this->db = new Database();
        $this->fm = new Format();
        }
        public function insert_category($catName){
        $catName = $this->fm->validation($catName);
        $catName = mysqli_real_escape_string($this->db->link, $catName);     
        if(empty($catName)){
            $alert = "Category  must be not empty";
            return $alert;
        }else{
            $query = "INSERT INTO tbl_category(catName) VALUES ('$catName')";
            $result = $this->db->insert($query);
            if($result){
                $alert = "<span class='success'> Thanh cong!</span>";
                return $alert;
            }else{
                $alert = "<span class='error'> That bai! </span>";
                return $alert;
            }
        }

        }
        public function show_category(){
            $query = "SELECT * FROM tbl_category ORDER BY catId desc";
            $result = $this->db->select($query);
            return $result;
        }
        public function getcatbyId($id){
            $query = "SELECT * FROM tbl_category WHERE catId = '$id'";
            $result = $this->db->select($query);
            return $result;
        }
        public function update_category($catName,$id){
            $catName = $this->fm->validation($catName);
            $catName = mysqli_real_escape_string($this->db->link, $catName);   
            $id = mysqli_real_escape_string($this->db->link, $id);
            if(empty($catName)){
                $alert = "Category  must be not empty";
                return $alert;
            }else{
                $query = "UPDATE tbl_category SET catName = '$catName' WHERE catId = '$id'";
                $result = $this->db->update($query);
                echo "<script>window.location ='catlist.php'</script>";
                if($result){
                    $alert = "<span class='success'> Thanh cong!</span>";
                    return $alert;
                }else{
                    $alert = "<span class='error'> That bai! </span>";
                    return $alert;
                }
            }
        }
        public function del_category($id){
            $query = "DELETE FROM tbl_category WHERE catId = '$id'";
            $result = $this->db->delete($query);
            if($result){
                $alert = "<span class='success'>Xoa thanh cong!</span>";
                return $alert;
            }else{
                $alert = "<span class='error'>Xoa that bai! </span>";
                return $alert;
            }
        }
        public function show_category_frontend(){
            $query = "SELECT * FROM tbl_category ORDER BY catId desc";
            $result = $this->db->select($query);
            return $result;
        }
        public function get_product_by_cat($id){
            $query = "SELECT * FROM tbl_product WHERE catId ='$id' ORDER BY catId desc LIMIT 8";
            $result = $this->db->select($query);
            return $result;
        }
        public function get_name_by_cat($id){
            $query = "SELECT tbl_product.*,tbl_category.catName,tbl_category.catId FROM tbl_product,tbl_category WHERE tbl_product.catId = tbl_category.catId And tbl_product.catId = '$id' LIMIT 1";
            $result = $this->db->select($query);
            return $result;
        }
    }
?>