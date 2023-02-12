<?php
include 'inc/header.php';
?>
<?php $login_check = Session::get('customer_login')	;
if($login_check){
	header('Location:order.php');
}
?>
<?php
	if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['submit'])){
	$insertcustomer = $cus->insert_customer($_POST);
}
?>
<?php
	if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['login'])){
	$logincustomer = $cus->login_customer($_POST);
}
?>
 <div class="main">
    <div class="content">
    	 <div class="login_panel">
        	<h3>Đăng nhập</h3>
        	<p>Nhập thông tin đăng nhập bên dưới</p>
			<?php 
			if(isset($logincustomer)){
				echo $logincustomer;			}
			?>
        	<form action="" method="POST">
                	<input type="text" name="email" class="field" placeholder="Nhập email">
                    <input type="password" name="password" class="field" placeholder="Nhập mật khẩu">
                     <p class="note">Quên mật khẩu?<a href="#">Bấm vào đây</a></p>
                    <div class="buttons"><div><input class="grey" name = "login" type="submit" value="Đăng nhập"></input></div></div>
                    </div>
			</form>		
    	<div class="register_account">
    		<h3>Đăng ký thành viên</h3>
			<?php 
			if(isset($insertcustomer)){
				echo $insertcustomer;
			}
			?>
    		<form action="" method="POST">
		   			 <table>
		   				<tbody>
						<tr>
						<td>
							<div>
							<input type="text" name="name" placeholder="Nhập tên của bạn" >
							</div>
							
							<div>
							   <input type="text" name="city" placeholder="Thành phố đang sinh sống">
							</div>
							
							<div>
								<input type="text" name="zipcode" placeholder="Zipcode">
							</div>
							<div>
								<input type="text" name="email" placeholder="Nhập email">
							</div>
		    			 </td>
		    			<td>
						<div>
							<input type="text" name="address" placeholder="Địa chỉ hiện tại">
						</div>
		    		<div>
						<select id="country" name="country" onchange="change_country(this.value)" class="frm-field required">
							<option value="null">Chọn quốc gia</option>         
							<option value="AF">Afghanistan</option>
		         </select>
				 </div>		        
	
		           <div>
		          <input type="text" name="phone" placeholder="Nhập số điện thoại">
		          </div>
				  
				  <div>
					<input type="text" name="password" placeholder="Nhập mật khẩu">
				</div>
		    	</td>
		    </tr> 
		    </tbody></table> 
		   <div class="search"><div><input type="submit" name="submit" class="grey" value="Tạo tài khoản"></input></div></div>
		    <p class="terms">Bằng cách bấm vào 'Tạo tài khoản' bạn đồng ý với<a href="#"> Điều khoản &amp; Điều kiện </a>của chúng tôi.</p>
		    <div class="clear"></div>
		    </form>
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>
 <?php
 include 'inc/footer.php';
?>