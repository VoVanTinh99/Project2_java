<!-- <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>
<script type="text/javascript" >
	var app = angular.module('myApp', []);
	app.controller('myController', function($scope){
		$scope.txtName = null;
		$scope.txtDetails = null;
	});
</script> -->
<?php 
include_once("PublisherController.php");
$name = "";
$description="";
if(isset($_POST['btnAdd']))
{
	$name = $_POST["txtName"];
	$description = $_POST["txtDetails"];
	addPublisher($name,$description);
	echo '<script> alert("Thêm nhà sản xuất thành công!");</script>';
	echo "<script>window.location.href='?page=publisher'</script>";
}
?>
<div class="row">
	<div class="col-md-12">
	<form action="" method="post" accept-charset="utf-8" enctype="multipart/form-data" form-horizontal>
		<div class="form_group">
			<label class="control-label col-sm-12" for="email"><h2 align="center">Add Producer</h2></label>
		</div>

	</form>
	<form class="form-horizontal" accept-charset="utf-8" method="post" role="form" name="myForm" >


		<div class="form-group">
			<label class="control-label col-md-2" for="txtName">Producer Names:</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" id="txtName" placeholder="Producer name" name="txtName"
				required autofocus >
				
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-md-2" for="txtDetails">Details:</label>
			<div class="col-md-10">          

				<textarea name="txtDetails" id="txtDetails"
				placeholder="Details" class="form-control" required ></textarea>
				
			</div>
		</div>

		<div class="form-group">        
			<div class="col-md-offset-2 col-md-10">
				<!-- <button type="submit" class="btn btn-info" name="btnAdd" onclick=""><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Thêm</button> -->
				<input type="submit" value="Add" name="btnAdd" class="btn btn-info" />
				<input type="reset" name="btnReset" class="btn btn-primary" value="Cancel">
			</div>
		</div>
	</form>
</div>