<?php 
include_once("CountryController.php");

$CountryId = 0;
	if(isset($_GET['CountryId']))
		$CountryId =$_GET['CountryId'];
	$name="";
	$details="";
	$result = searchCountry($CountryId);
	//Lấy dữ liệu đưa vào mảng
	if(isset($result))
	{
		list($CountryId,$name,$details)=mysqli_fetch_array($result);
	}
	//Cập nhật lại dữ liệu
	if(isset($_POST['btnUpdate']))
	{
		$CountryId=$_GET['CountryId'];
		$name=$_POST['txtName'];
		$details=$_POST['txtDetails'];
		updateCountry($CountryId,$name,$details);
		echo '<script> alert("Update Success!");</script>';
		echo "<script>window.location.href='?page=country'</script>";
	}

	?>
	<div class="row">
		<div class="col-md-12"/>
		<form action="" method="post" accept-charset="utf-8" enctype="multipart/form-data" form-horizontal>
			<div class="form_group">
				<label class="control-label col-sm-12" for="email"><h2 align="center">Original Update</h2></label>
			</div>

		</form>
		<form class="form-horizontal" accept-charset="utf-8" method="post" role="form" >

			<div class="form-group">
				<label class="control-label col-md-2" for="txtName">Num:</label>
				<div class="col-sm-10">
					<input type="number" class="form-control" id="txtNum"  name="txtNum"
					required  readonly="true" value="<?php echo $CountryId;?>" >
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-2" for="txtName">Original:</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="txtName"  name="txtName"
					required autofocus value="<?php echo $name;?>" >
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-2" for="txtDetails">Details:</label>
				<div class="col-md-10">          
					<textarea name="txtDetails" id="txtDetails" class="form-control"><?php echo 
					$details;?></textarea>
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
