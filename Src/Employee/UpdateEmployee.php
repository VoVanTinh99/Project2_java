
<?php 

$empCode = "";
if(isset($_GET['empCode'])){
	$empCode =$_GET['empCode'];
}
$empPass="";
$empName="";
$empBrith=date_default_timezone_set('Asia/Tokyo');
$empAddress="";
$empMail="";
$empIC="";
$empRole="";
$result = searchEmployee($empCode);

	//Lấy dữ liệu đưa vào mảng
if(isset($result))
{
	list($empCode,$empPass,$empName,$empBrith,$empAddress,$empMail,$empIC,$empRole)=mysql_fetch_array($result);
}
	//Cập nhật lại dữ liệu
if(isset($_POST['btnUpdate']))
{
	$empCode= $_POST["txtName"];
	$empPass=$_POST["txtPassword"];
	$empName=$_POST["txtHoten"];
	$empBrith=date('Y-m-d',  strtotime($_POST['txtDate']));
	$empAddress= $_POST["txtAddress"];
	$empMail=$_POST["txtEmail"];
	$empIC= $_POST["txtCMND"];
	$empRole=$_POST["slRole"];
	updateEmployee($empCode,$empPass,$empName,$empBrith,$empAddress,$empMail,$empIC,$empRole);
	echo '<script> alert("Cập nhật thành công!");</script>';
		echo "<script>window.location.href='?page=employee'</script>";
}

?>

<div class="row">
	<div class="col-md-12">
		<form action="" method="post" accept-charset="utf-8" enctype="multipart/form-data" form-horizontal>
			<div class="form_group">
				<label class="control-label col-sm-12" for="email"><h2 align="center">Cập Nhật Thông Tin Nhân Viên</h2></label>
			</div>

		</form>
		<form class="form-horizontal" accept-charset="utf-8" method="post" role="form" >
			<div class="form-group">
				<label class="control-label col-md-2" for="txtName">Mã Nhân viên:</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="txtName" placeholder="Nhập vào tên loại rượu" name="txtName"
					required autofocus="" value="<?php echo $empCode?>">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-2" for="txtPassword">Mật khẩu:</label>
				<div class="col-md-10">          

					<input type="password" class="form-control" id="txtPassword" placeholder="Nhập vào mật khẩu của nhân viên" name="txtPassword"
					required  value="<?php echo $empPass;?>">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-2" for="txtHoten">Họ và tên:</label>
				<div class="col-md-10">          

					<input type="text" class="form-control" id="txtHoten" placeholder="Nhập vào họ tên của nhân viên" name="txtHoten"
					required value="<?php echo $empName;?>"/>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-2" for="txtDate">Ngày tháng năm sinh:</label>
				<div class="col-md-10">          

					<input type="date" class="form-control" id="txtDate" placeholder="Nhập vào ngày tháng năm sinh" name="txtDate" value="<?php echo $empBrith;?>"
					required  >
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-2" for="txtAddress">Địa chỉ:</label>
				<div class="col-md-10">          

					<input type="text" class="form-control" id="txtAddress" placeholder="Nhập vào địa ch3i của nhân viên" name="txtAddress" value="<?php echo $empAddress;?>"
					required >
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-2" for="txtEmail">Email:</label>
				<div class="col-md-10">          

					<input type="email" class="form-control" id="txtEmail" placeholder="Nhập vào địa chỉ của nhân viên" name="txtEmail" value="<?php echo $empMail;?>"
					required  >
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-2" for="txtCMND">CMND:</label>
				<div class="col-md-10">          
					<input type="text" class="form-control" id="txtCMND" placeholder="Nhập vào chứng minh nhân dân" name="txtCMND" value="<?php echo $empIC;?>"
					required  >
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-2" for="slRole">Quyền:</label>
				<div class="col-md-10" >          
					<?php
					$sqlSelect = "SELECT `RoleId`, `RoleName`, `RoleDetails`, `RoleActive` FROM `role`";
					$result = mysql_query($sqlSelect);
					$selectedValue = "";
					echo "<select name='slRole' class='form-control'>";
					while ($row=mysql_fetch_array($result,MYSQL_ASSOC)) 
					{
						if($row['RoleId'] == $selectedValue)
						{
							echo "<option value='".$row['RoleId']."' selected>".$row['RoleName']."</option>";
						}
						else
						{
							echo "<option value='".$row['RoleId']."'>".$row['RoleName']."</option>";
						}
					}
					echo "</select>";
					?>
				</div>
			</div>
			<div class="form-group">        
				<div class="col-md-offset-2 col-md-10">
					<button type="submit" class="btn btn-info" name="btnUpdate" onclick=""><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Thêm</button>
					<button type="reset" class="btn btn-danger"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Bỏ Qua</button>
				</div>
			</div>
		</form>
	</div>