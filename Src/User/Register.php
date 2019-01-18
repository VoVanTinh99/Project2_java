<?php
include_once("UserController.php");
$username= "";
$password="";
$fullname="";
$sex="";
$address="";
$phone="";

$email="";
$dayofbirth = date_default_timezone_set('Asia/Tokyo');
$identitycard="";
if(isset($_POST["btnRegister"]))
{
	$sql_qry_user = "SELECT * FROM user WHERE Username = '{$_POST["txtUsername"]}'";
	$row_qry_user = mysqli_fetch_array(mysqli_query($conn,$sql_qry_user));
	if($row_qry_user['Username'] == $_POST["txtUsername"]) {
		echo '<script> alert("Đã tồn tại tài khoản. Vui lòng nhập lại!");</script>';
	} else {
		$password = $_POST["txtPassword"];
		$repeatpassword = $_POST["txtRepeatPassword"];
		if($password!=$repeatpassword){
			echo '<script> alert("Mật khẩu không trùng khớp. Vui lòng nhập lại!");</script>';
		}else{

			$username = $_POST["txtUsername"];
			$fullname=$_POST["txtFullname"];
			if(isset($_POST['grpGender'])) {
				$sex = $_POST['grpGender'];
			}
			$phone=$_POST["NumPhone"];
			$email=$_POST["txtEmail"];

			$dayofbirth=date('Y-m-d',strtotime($_POST['dateOfBirth']));
			addUser($username, $password,$fullname,$sex,$phone,$email,$dayofbirth);
			include('class.smtp.php');
			include "class.phpmailer.php";
			include "functions.php";
			$title = '[Windsor Shop] - Register';
		$content = "Welcome ".$fullname.",<br/> <br/> Please click <a href='http://localhost/CT250/index.php?page=ActiveAccount&&username=".$username."'>here</a> to active account.";
			$To = $email;
			$mail = sendMail($title, $content, $email);
			echo '<script> alert("Đăng ký tài khoản thành công!");</script>';
			echo '<meta http-equiv="refresh" content="0: URL=Register.php"/>';
		}
	}
}
?>

<?php
if (isset($_POST['btnLogin'])) {
	$loginusername = trim($_POST["txtSignIn"]);
	$loginpassword = trim($_POST["txtPassword"]);


	$loginpassword = md5($loginpassword);
	$result = mysqli_query($conn,"SELECT * FROM User WHERE Username='$loginusername' AND Password='$loginpassword'");
	if (mysqli_num_rows($result) == 1)
	{
		$_SESSION["username"] = $loginusername;
	}else{
		echo '<script> alert("Tên tài khoản hoặc mật khẩu không chính xác!");</script>';
	}
}
if(isset($_POST['btn_submit']))
    {
        $email = $_POST['email'];
        $random = rand(1000, 1000000);
        $sql="select * from User where email='$email'";
        $result= mysqli_query($conn, $sql);
        $qr="update User set password =  md5('$random') where email='$email'";
        $sq= mysqli_query($conn, $qr);
        if(mysqli_num_rows($result)>0)
  {
    echo "<script>alert('Email success');</script>";
    }
  else{
    echo "<script>alert('email not success');</script>";
        } 
    }
?>
<style>
	.forgot{
		outline: none;border: none; background: #212121;padding: 10px 0; color: #fff; width: 40%;font-size: 1em; text-transform: uppercase; margin: 2em 0 0;
	}
	.forgot:hover{
		background-color: #FF9B05;
	}
</style>
<!-- header -->
<div class="modal fade" id="myModal88" tabindex="-1" role="dialog" aria-labelledby="myModal88"
aria-hidden="true">
<div class="modal-dialog modal-lg">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
			&times;</button>
		</div>
		<div class="modal-body modal-body-sub">
			<div class="row">
				<div class="col-md-8 modal_body_left modal_body_left1" style="border-right: 1px dotted #C2C2C2;padding-right:3em;">
					<div class="sap_tabs">
						<div id="horizontalTab" style="display: block; width: 100%; margin: 0px;">
							<ul>
								<li class="resp-tab-item" aria-controls="tab_item-0"><span>Sign In</span></li>
								<li class="resp-tab-item" aria-controls="tab_item-1"><span>Sign up</span></li>
							</ul>
							<div class="tab-1 resp-tab-content" aria-labelledby="tab_item-0">
								<div class="facts">
									<div class="register">
										<form action="" method="post">
											<input name="txtSignIn" placeholder="Account" type="text" required>
											<input name="txtPassword" placeholder="Password" type="password" required="">
											<div class="sign-up">
												<input type="submit" name="btnLogin" value="Log In" />
												<a href="#" ><input type="button" name="btnforgot" value="Forgot Pass" class="forgot" data-toggle="modal" data-target="#myModal"/></a>
											</div>
										</form>
									</div>
								</div>
							</div>
							<!---->
  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog" style="background-color: #FFFFFF;">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="register">
	  <div class="container">
    <div class="row">
        <form method="POST" enctype="multipart/form-data" id="form" name="form">
       
        <legend style="color: red;padding-left:10px;">FORGOT PASSWORD</legend>
        <div class="col-sm-4">
          <p>
            <label for="email">Email</label>
            <input id="email" type="email" name="email"  placeholder="Nhập địa chỉ email" require>
          </p>
          <p>
            <label for="To">Tên Người Nhận</label><br>
            <input id="To" type="text" name="To"  placeholder="Nhập Tên Người Nhận" require>
          </p>
          <p>
            <input type="submit" class="forgot" value="submit" name="btn_submit" id="btn_submit" style="margin-top: -1px;">
          </p>
        </div>
        </form>
        </div>
        </div>
	</div>
      
    </div>
  </div>
							<!---->
							<div class="tab-2 resp-tab-content" aria-labelledby="tab_item-1" >
								<div class="facts">
									<div class="register" >
										<form  method="post" name="myForm" >
											<div class="form-group">
												<input placeholder="Account" name="txtUsername" type="text" required="" >

											</div>
											<div class="form-group">
												<input placeholder="Full Names" name="txtFullname" type="text" required="" >

											</div>
											<div class="form-group">
												<input placeholder="Email Address" name="txtEmail" type="email" required="">
											</div>
											<div class="form-group">
								<input placeholder="Phone Number" name="NumPhone" type="text" pattern="^(0|+84)]\d{9,10})$"  class="form-control" maxlength="11">
											</div>
											<div class="form-group">
												<input placeholder="Birthday" name="dateOfBirth" type="date"  class="form-control" required="" value="2018-01-01">	</div>
												<div class="form-group">

													<input placeholder="Password" name="txtPassword" type="password" required="" >

												</span>
											</div>
											<div class="form-group">

												<input placeholder="Repeat password" name="txtRepeatPassword" type="password" required="" >

											</div>
											<div class="form-group">
												<label for="lblGender" class="col-sm-2 control-label">Gender:  </label>
												<div class="col-sm-10">
													<label class="radio-inline"><input type="radio" name="grpGender" value="0"
														<?php if(isset($Gender)&&$Gender=="0") { echo "checked";} ?> />
													Male</label>

													<label class="radio-inline"><input type="radio" name="grpGender" value="1"
														<?php if(isset($Gender)&&$Gender=="1") { echo "checked";} ?> />
													Female</label>

												</div>
											</div>
											<div class="sign-up">
												<input type="submit" value="Register" name="btnRegister" id="btnRegister"/>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
					<script>
						var app = angular.module('myApp', []);
						app.controller('myController', function($scope) {
							$scope.txtUsername = "";
							$scope.txtEmail = "";
							$scope.NumPhone = "";
							$scope.txtFullname="";
							$scope.txtPassword="";
						});
					</script>
					<script src="public/client/js/easyResponsiveTabs.js" type="text/javascript"></script>
					<script type="text/javascript">
						$(document).ready(function () {
							$('#horizontalTab').easyResponsiveTabs({
										type: 'default', //Types: default, vertical, accordion
										width: 'auto', //auto or any width like 600px
										fit: true   // 100% fit in a container
									});
						});
					</script>
					<div id="OR" class="hidden-xs">
					OR</div>
				</div>
				<div class="col-md-4 modal_body_right modal_body_right1">
					<div class="row text-center sign-with">
						<div class="col-md-12">
							<h3 class="other-nw pull-left">
							You may connect with</h3>
						</div>
						<div class="col-md-12">
							<ul class="social">
								<li class="social_facebook"><a href="#" class="entypo-facebook"></a></li>
								<li class="social_dribbble"><a href="#" class="entypo-dribbble"></a></li>
								<li class="social_twitter"><a href="#" class="entypo-twitter"></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
<?php
if(isset($_POST['btn_submit']))
{
    include('forgot/class.smtp.php');
    include "forgot/class.phpmailer.php"; 
    $mFrom = 'vovantinhts@gmail.com';  //dia chi email cua ban 
    $mPass = 'vovantinh84_99';       //mat khau email cua ban
    $email = $_POST['email'];
    $To = $_POST['To'];
    $mail             = new PHPMailer();
    $body             = 'Mã số của bạn để khôi phục tài khoản là: ' . $random;   // Noi dung email
    $title = 'Kích hoạt tài khoản'  ;   //Tieu de gui mail
    $mail->IsSMTP();             
    $mail->CharSet  = "utf-8";
    $mail->SMTPDebug  = 0;   // enables SMTP debug information (for testing)
    $mail->SMTPAuth   = true;    // enable SMTP authentication
    $mail->SMTPSecure = "ssl";   // sets the prefix to the servier
    $mail->Host       = "smtp.gmail.com";    // sever gui mail.
    $mail->Port       = 465;         // cong gui mail de nguyen
    // xong phan cau hinh bat dau phan gui mail
    $mail->Username   = $mFrom; 
    $mail->Password   = $mPass;
    $mail->SetFrom($mFrom);
    $mail->AddReplyTo('vovantinhts@gmail.com', 'vovantinhts@gmail.com'); 
    $mail->Subject    = $title;
    $mail->MsgHTML($body);
    $mail->AddAddress($email, $To);
if(!$mail->Send()) {
        echo 'Co loi!';
         
    } else {
         
        echo 'Check mail!!!';
    }
  }
?>