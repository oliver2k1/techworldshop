<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/database.php');
include_once ($filepath.'/../helper/format.php');
?>
<?php
    class brand{
        private $db;
        private $fm;

        public function __construct(){
        $this->db = new Database();
        $this->fm = new Format();
        }
        public function insert_brand($brandName){
        $brandName = $this->fm->validation($brandName);
        $brandName = mysqli_real_escape_string($this->db->link, $brandName);     
        if(empty($brandName)){
            $alert = "Brand  must be not empty";
            return $alert;
        }else{
            $query = "INSERT INTO tbl_brand(brandName) VALUES ('$brandName')";
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
        public function show_brand(){
            $query = "SELECT * FROM tbl_brand ORDER BY brandId desc";
            $result = $this->db->select($query);
            return $result;
        }
        public function getbrandbyId($id){
            $query = "SELECT * FROM tbl_brand WHERE brandId = '$id'";
            $result = $this->db->select($query);
            return $result;
        }
        public function update_brand($brandName,$id){
            $brandName = $this->fm->validation($brandName);
            $brandName = mysqli_real_escape_string($this->db->link, $brandName);   
            $id = mysqli_real_escape_string($this->db->link, $id);
            if(empty($brandName)){
                $alert = "Brand  must be not empty";
                return $alert;
            }else{
                $query = "UPDATE tbl_brand SET brandName = '$brandName' WHERE brandId = '$id'";
                $result = $this->db->update($query);
                echo "<script>window.location ='brandlist.php'</script>";
                if($result){
                    $alert = "<span class='success'> Thanh cong!</span>";
                    return $alert;
                }else{
                    $alert = "<span class='error'> That bai! </span>";
                    return $alert;
                }
            }
        }
        public function del_brand($id){
            $query = "DELETE FROM tbl_brand WHERE brandId = '$id'";
            $result = $this->db->delete($query);
            if($result){
                $alert = "<span class='success'>Xoa thanh cong!</span>";
                return $alert;
            }else{
                $alert = "<span class='error'>Xoa that bai! </span>";
                return $alert;
            }
        }
    }
?>