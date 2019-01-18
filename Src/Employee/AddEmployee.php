<?php
include("EmployeeController.php");
$empCode="";
$empPass="";
$empName="";
$empBrith="";
$empAddress="";
$empMail="";
$empIC="";
$empRole="";
if(isset($_POST["btnAdd"]))
	{
		$empCode= $_POST["txtName"];
		$empPass=$_POST["txtPassword"];
		$empName=$_POST["txtHoten"];
		$empBrith=date('Y-m-d',  strtotime($_POST['txtDate']));
		$empAddress= $_POST["txtAddress"];
		$empMail=$_POST["txtEmail"];
		$empIC= $_POST["txtCMND"];
		$empRole=$_POST["slRole"];
		addEmployee($empCode,$empPass,$empName,$empBrith,$empAddress,$empMail,$empIC,$empRole);
		echo '<script> alert("Thêm nhân viên thành công");</script>';
		echo "<script>window.location.href='?employee.php'</script>";
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Add Employee</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<div class="row">
	<div class="col-md-12">
	<form action="" method="post" accept-charset="utf-8" enctype="multipart/form-data" form-horizontal>
		<div class="form_group">
			<label class="control-label col-sm-12" for="email"><h2 align="center">Thêm Nhân Viên</h2></label>
		</div>

	</form>
	<form class="form-horizontal" accept-charset="utf-8" method="post" role="form" >
		<div class="form-group">
			<label class="control-label col-md-2" for="txtName">Mã Nhân viên:</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" id="txtName" placeholder="Nhập vào mã nhân viên" name="txtName"
				required autofocus="" >
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-md-2" for="txtPassword">Mật khẩu:</label>
			<div class="col-md-10">

				<input type="password" class="form-control" id="txtPassword" placeholder="Nhập vào mật khẩu của nhân viên" name="txtPassword"
				required  >
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-md-2" for="txtHoten">Họ và tên:</label>
			<div class="col-md-10">

				<input type="text" class="form-control" id="txtHoten" placeholder="Nhập vào họ tên của nhân viên" name="txtHoten"
				required />
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-md-2" for="txtDate">Ngày tháng năm sinh:</label>
			<div class="col-md-10">

				<input type="date" class="form-control" id="txtDate" placeholder="Nhập vào ngày tháng năm sinh" name="txtDate"
				required  >
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-md-2" for="txtAddress">Địa chỉ:</label>
			<div class="col-md-10">

				<input type="text" class="form-control" id="txtAddress" placeholder="Nhập vào địa ch3i của nhân viên" name="txtAddress"
				required >
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-md-2" for="txtEmail">Email:</label>
			<div class="col-md-10">

				<input type="email" class="form-control" id="txtEmail" placeholder="Nhập vào địa chỉ của nhân viên" name="txtEmail"
				required  >
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-md-2" for="txtCMND">CMND:</label>
			<div class="col-md-10">
				<input type="text" class="form-control" id="txtCMND" placeholder="Nhập vào chứng minh nhân dân" name="txtCMND"
				required  >
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-md-2" for="slRole">Quyền:</label>
			<div class="col-md-10">
				<?php
				blindListRole();
				?>
			</div>
		</div>
		<div class="form-group">
			<div class="col-md-offset-2 col-md-10">
				<button type="submit" class="btn btn-info" name="btnAdd" onclick=""><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Thêm</button>
				<button type="reset" class="btn btn-danger"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Bỏ Qua</button>
			</div>
		</div>
	</form>
</div>
</body>
</html>