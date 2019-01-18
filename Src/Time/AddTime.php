<?php 
include_once("TimeController.php");

if(isset($_POST["btnAdd"]))
{
	$applicationTime= date_default_timezone_set('Asia/Tokyo');
	$ApplicationTime=date('Y-m-d',strtotime($_POST['txtName']));
	echo $ApplicationTime;
	addTime($ApplicationTime);
	echo '<script> alert("Insert Success!");</script>';
	echo "<script>window.location.href='?page=time'</script>";

}
?>
<div class="row">
	<div class="col-md-12"/>
	<form action="" method="post" accept-charset="utf-8" enctype="multipart/form-data" form-horizontal>
		<div class="form_group">
			<label class="control-label col-sm-12" for="email"><h2 align="center">Manage Time</h2></label>
		</div>

	</form>
	<form class="form-horizontal" accept-charset="utf-8" method="post" role="form" >


		<div class="form-group">
			<label class="control-label col-md-2" for="txtName">Date:</label>
			<div class="col-sm-10">
				<input type="date" class="form-control" id="txtName" name="txtName" value="2018-01-01"
				required>
			</div>
		</div>
		<div class="form-group">        
			<div class="col-md-offset-2 col-md-10">
				<button type="submit" class="btn btn-info" name="btnAdd" onclick=""><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Add</button>
				<button type="reset" class="btn btn-danger"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Cancel</button>
			</div>
		</div>
	</form>
</div>