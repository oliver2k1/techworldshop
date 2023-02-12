<?php
include 'inc/header.php';
include 'inc/slider.php';
?>
<?php $login_check = Session::get('customer_login')	;
if($login_check==false){
	header('Location:login.php');
}
?>
<style>
.order_page{
    font-size: 40px;
    font-weight:bold ;
    color: red;
    text-align:center;
    margin-top: 100px;
    margin-bottom:100px 
}
</style>   
    <div class ="order_page">
            <h1>Order Page</h1>
    </div>
<?php
include 'inc/footer.php';
?>