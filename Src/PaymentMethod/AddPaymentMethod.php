
<?php 
$name= "";
$description ="";
if(isset($_POST["btnAdd"]))
{
	$name = $_POST["txtName"];
	$description = $_POST["txtDetails"];
	addPaymentMethod($name,$description);
	echo '<script> alert("Đã tạo mới một hình thức thanh toán!");</script>';
	echo "<script>window.location.href='?page=paymentmethod'</script>";

}
?>
<div class="row">
	<div class="col-md-12"/>
	<form action="" method="post" accept-charset="utf-8" enctype="multipart/form-data" form-horizontal>
		<div class="form_group">
			<label class="control-label col-sm-12" for="email"><h2 align="center">Add Payment Method</h2></label>
		</div>

	</form>
	<form class="form-horizontal" accept-charset="utf-8" method="post" role="form" >


		<div class="form-group">
			<label class="control-label col-md-2" for="txtName">Payment Names:</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" id="txtName" placeholder="Enter Payment" name="txtName"
				required autofocus >
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-md-2" for="txtDetails">Detaild:</label>
			<div class="col-md-10">          

				<textarea name="txtDetails" id="txtDetails"
				placeholder="Enter Details about payment" " class="form-control" required></textarea>
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
