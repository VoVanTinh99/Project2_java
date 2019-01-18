<?php 
include_once("PublisherController.php");

$PublisherId = 0;
	if(isset($_GET['PublisherId']))
		$PublisherId=$_GET['PublisherId'];
	$name="";
	$description="";
	$result = searchPublisher($PublisherId);
	//Lấy dữ liệu đưa vào mảng
	if(isset($result))
	{
		list($PublisherId,$name,$description)=mysqli_fetch_array($result);
	}
	//Cập nhật lại dữ liệu
	if(isset($_POST['btnUpdate']))
	{
		$PublisherId=$_GET['PublisherId'];
		$name=$_POST['txtName'];
		$description=$_POST['txtDetails'];
		updatePublisher($PublisherId,$name,$description);
		echo '<script> alert("Update Success!");</script>';
		echo "<script>window.location.href='?page=publisher'</script>";
	}

	?>
	<div class="row">
		<div class="col-md-12"/>
		<form action="" method="post" accept-charset="utf-8" enctype="multipart/form-data" form-horizontal>
			<div class="form_group">
				<label class="control-label col-sm-12" for="email"><h2 align="center">Producer</h2></label>
			</div>

		</form>
		<form class="form-horizontal" accept-charset="utf-8" method="post" role="form" >

			<div class="form-group">
				<label class="control-label col-md-2" for="txtName">Num:</label>
				<div class="col-sm-10">
					<input type="number" class="form-control" id="txtNum"  name="txtNum"
					required  readonly="true" value="<?php echo $PublisherId;?>" >
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-2" for="txtName">Producer Names:</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="txtName"  name="txtName"
					required autofocus value="<?php echo $name;?>" >
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-2" for="txtDetails">Details:</label>
				<div class="col-md-10">          
					<textarea name="txtDetails" id="txtDetails" class="form-control"><?php echo 
					$description;?></textarea>
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
