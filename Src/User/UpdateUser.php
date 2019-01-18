<?php
if(isset($_SESSION['username'])) {
	$query ="SELECT FullName, Phone, Email, Address, IC
	FROM user 
	WHERE Username = '".$_SESSION['username']."'";
	$result = mysqli_query($conn, $query);
	$row = mysqli_fetch_array($result);
	$username = $_SESSION['username'];
	$hoten = $row['FullName'];
	$email = $row['Email'];
	$phone = $row['Phone'];
	$address = $row['Address'];
	$ic = $row['IC'];
		//Cập Nhật thông tin khách hàng
	if(isset($_POST['btnCapNhat'])){
		$query = "SELECT FullName, Phone, Email, Address, IC
		FROM user 
		WHERE Username = '". $_SESSION['username'] . "'";
		$result = mysqli_query($conn,$query) ;
		echo $result;
		$row = mysqli_fetch_row($result);
		$hoten=$_POST['txtHoTen'];
		$address  = $_POST['txtDiaChi'];
		$phone = $_POST['txtDienThoai'];
		$ic =$_POST['txtIC'];
		$email = $_POST['txtEmail'];
		$Updateresult = mysqli_query($conn, "UPDATE `user`
			SET FullName='".$hoten."',Address='".$address."',
			Phone='".$phone."',IC='".$ic."',Email='".$email."'
			WHERE Username = '" . $_SESSION['username'] . "'");
		if($Updateresult){
			echo "<script>alert('Cập Nhật Thành Công!');window.location='./';</script>";
		}else{
			echo "<script>alert('Loi');window.location='./';</script>";
		}
	}

	?>

	<div class="container">
		<!-- Modal -->
		<div class="modal fade" id="myLoginModal" role="dialog">
			<div class="modal-dialog">
				<!-- Modal content-->
				<div class="modal-content">
					<form id="form1" name="form1" method="post" action="#" class="form-horizontal" role="form">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title text-center" >Update Customer Information</h4>
						<hr/>
					</div>
					<div class="modal-body">
						
							<div class="form-group">
								<label for="lblusername" class="col-sm-2 control-label">Username (*):  </label>
								<div class="col-sm-10">
									<input type="text" name="txtUsername" id="txtUsername" value="<?php if(isset($username)) echo $username; ?>" class="form-control" readonly />
								</div>
							</div>

							<div class="form-group">   
								<label for="txtEmail" class="col-sm-2 control-label">Email (*):  </label>
								<div class="col-sm-10">

									<input type="text" name="txtEmail" id="txtEmail" value="<?php if(isset($email)) echo $email; ?>" class="form-control" readonly />
								</div>
							</div>  
							<div class="form-group">                         
								<label for="txtHoTen" class="col-sm-2 control-label">Full Name (*):  </label>
								<div class="col-sm-10">
									<input type="text" name="txtHoTen" id="txtHoTen"  required="true"  value="<?php echo $hoten; ?>" class="form-control" />
								</div>
							</div>

							<div class="form-group"> 
								<label for="txtDiaChi" class="col-sm-2 control-label">Address (*):  </label>
								<div class="col-sm-10">
									<input type="text" name="txtDiaChi" id="txtDiaChi"  required="true"  value="<?php if(isset($address)) echo $address; ?>" class="form-control" />
								</div>
							</div>
							<div class="form-group"> 
								<label for="txtDienThoai" class="col-sm-2 control-label">Phone (*):  </label>
								<div class="col-sm-10">
									<input type="tel" name="txtDienThoai" minlength="10" maxlength="11" required="true" value="<?php if(isset($phone)) echo $phone; ?>" class="form-control" />
								</div>
							</div>
							<div class="form-group"> 
								<label for="txtIC" class="col-sm-2 control-label">Indentity Card (*):  </label>
								<div class="col-sm-10">
									<input type="text" name="txtIC" id="txtIC"  required="true" minlength="9" maxlength="9" value="<?php if(isset($ic )) echo $ic; ?>" class="form-control"  />
								</div>
							</div>
						
					</div>
					<div class="modal-footer">
						<input type="submit"  class="btn btn-primary" name="btnCapNhat" id="btnCapNhat" value="Cập nhật"/>

					</div>
					</form>
				</div>

			</div>
		</div>

	</div>
	<?php 
} ?>
