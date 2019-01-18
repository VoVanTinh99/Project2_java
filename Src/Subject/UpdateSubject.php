	<?php 
	include_once("SubjectController.php");
	$SubjectId = 0;
	if(isset($_GET['SubjectId']))
		$SubjectId=$_GET['SubjectId'];
	$name="";
	$result = searchSubject($SubjectId);
	//Lấy dữ liệu đưa vào mảng
	if(isset($result))
	{
		list($SubjectId,$name)=mysqli_fetch_array($result);
	}
	//Cập nhật lại dữ liệu
	if(isset($_POST['btnUpdate']))
	{
		$SubjectId=$_GET['SubjectId'];
		$name=$_POST['txtName'];
		updateSubject($SubjectId,$name);
		echo '<script> alert("Update Success!");</script>';
		echo "<script>window.location.href='?page=subject'</script>";
	}

	?>
	<div class="row">
		<div class="col-md-12"/>
		<form action="" method="post" accept-charset="utf-8" enctype="multipart/form-data" form-horizontal>
			<div class="form_group">
				<label class="control-label col-sm-12" for="email"><h2 align="center">Subject</h2></label>
			</div>

		</form>
		<form class="form-horizontal" accept-charset="utf-8" method="post" role="form" >

			<div class="form-group">
				<label class="control-label col-md-2" for="txtName">Subject Names:</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="txtNum"  name="txtName"
					required   value="<?php echo $name;?>" >
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
