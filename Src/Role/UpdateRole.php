	<?php 
	include_once("RoleController.php");
	$RoleId = 0;
	if(isset($_GET['RoleId'])){
		$RoleId=$_GET['RoleId'];
	}

	$name="";
	$description="";
	$RoleActive="";
	$result = searchRole($RoleId);
	//Lấy dữ liệu đưa vào mảng
	if(isset($result))
	{
		list($RoleId,$name,$description,$RoleActive)=mysqli_fetch_array($result);
	}
	//Cập nhật lại dữ liệu
	if(isset($_POST['btnUpdate']))
	{
		$RoleId=$_GET['RoleId'];
		$name=$_POST['txtName'];
		$description=$_POST['txtDetails'];
		$RoleActive=$_POST['RoleActive'];
		updateRole($RoleId, $name,$description,$RoleActive);
		echo '<script> alert("Cập nhật thành công!");</script>';
		echo "<script>window.location.href='?page=role'</script>";
	}

	?>
	<div class="row">
		<div class="col-md-12"/>
		<form action="" method="post" accept-charset="utf-8" enctype="multipart/form-data" form-horizontal>
			<div class="form_group">
				<label class="control-label col-sm-12" for="email"><h2 align="center">Update role</h2></label>
			</div>

		</form>
		<form class="form-horizontal" accept-charset="utf-8" method="post" role="form" >

			<div class="form-group">
				<label class="control-label col-md-2" for="txtName">Num:</label>
				<div class="col-sm-10">
					<input type="number" class="form-control" id="txtNum"  name="txtNum"
					required  readonly="true" value="<?php echo $RoleId;?>" >
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-2" for="txtName">Role Names:</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="txtName" placeholder="Nhập vào tên loại rượu" name="txtName"
					required autofocus value="<?php echo $name;?>" >
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-2" for="txtDetails">Details:</label>
				<div class="col-md-10">          
					<textarea name="txtDetails" id="txtDetails" class="form-control"><?php echo $description;?></textarea>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-2" for="RoleActive">Status:</label>
				<div class="col-md-10">          
					<textarea name="RoleActive" id="RoleActive" class="form-control"><?php echo $RoleActive?></textarea>
				</div>
			</div>

			<div class="form-group">        
				<div class="col-md-offset-2 col-md-10">
					<button type="submit" class="btn btn-info" name="btnUpdate" onclick=""><span class="glyphicon glyphicon-ok" aria-hidden="true"></span>Update</button>
					<button type="reset" class="btn btn-danger"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span>Cancel</button>
				</div>
			</div>
		</form>
	</div>
