	<?php 
	$TimeId = 0;
	if(isset($_GET['TimeId']))
		$TimeId =$_GET['TimeId'];
	$ApplicationTime=date_default_timezone_set('Asia/Tokyo');
	$result = searchTimeeasy($TimeId);
	//Lấy dữ liệu đưa vào mảng
	if(isset($result))
	{
		list($TimeId,$ApplicationTime)=mysqli_fetch_array($result);
	}

	
	//Cập nhật lại dữ liệu
	if(isset($_POST['btnUpdate']))
	{
		$TimeId=$_GET['TimeId'];
		$ApplicationTime=date('Y-m-d',  strtotime($_POST['txtApplicationTime']));
		updateTime($TimeId,$ApplicationTime);
		echo '<script> alert("Update success!");</script>';
		echo "<script>window.location.href='?page=time'</script>";
	}

	?>
	<div class="row">
		<div class="col-md-12">
		<form action="" method="post" accept-charset="utf-8" enctype="multipart/form-data" form-horizontal>
			<div class="form_group">
				<label class="control-label col-sm-12" for="email"><h2 align="center">Time Application</h2></label>
			</div>

		</form>
		<form class="form-horizontal" accept-charset="utf-8" method="post" role="form" >
			<div class="form-group">
				<label class="control-label col-md-2" for="txtTimeId">Code:</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="txtTimeId"  name="txtTimeId"
					required   value="<?=$TimeId?>" readonly=true>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-2" for="txtApplicationTime">Time Application:</label>
				<div class="col-sm-10">
					<input type="date" class="form-control" id="txtApplicationTime"  name="txtApplicationTime"
					required   value="<?=$ApplicationTime?>" >
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
