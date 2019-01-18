<?php 
$WineId = 0;
if(isset($_GET['WineId']))
	$WineId=$_GET['WineId'];
$name ="";
$quantity = "";
$result = searchWineWithQuantityEqualsZero($WineId);
	//Lấy dữ liệu đưa vào mảng
if(isset($result))
{
	list($WineId,$name)=mysqli_fetch_array($result);
}
	//Cập nhật lại dữ liệu
if(isset($_POST['btnUpdate']))
{
	$WineId=$_GET['WineId'];
	$quantity = $_POST['txtNum'];
	updateQuantityWine($WineId,$quantity);
	echo '<script> alert("Cập nhật thành công!");</script>';
	echo "<script>window.location.href='http://localhost/CT250/admin/dashboard.php'</script>";
}

?>

<div class="row">
	<div class="col-md-12"/>
	<form action="" method="post" accept-charset="utf-8" enctype="multipart/form-data" form-horizontal>
		<div class="form_group">
			<label class="control-label col-sm-12" for="email"><h2 align="center">Update Quntity</h2></label>
		</div>

	</form>
	<form class="form-horizontal" accept-charset="utf-8" method="post" role="form" >
		<div class="form-group">
			<label class="control-label col-md-2" for="txtName">Wine Code:</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" id="WineId"  name="WineId"
				readonly="readonly" value="<?php echo $WineId;?>" >
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-md-2" for="wineName">Wine Name:</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" id="wineName" name="wineName"
				disabled value="<?php echo $name; ?>" >
			</div>
		</div>
		
		<div class="form-group">
			<label class="control-label col-md-2" for="txtNum">Quantity:</label>
			<div class="col-md-10">          
				<input type="text" class="form-control" id="txtNum"  name="txtNum" value="0"
				required  >
			</div>
		</div>
		<div class="form-group">        
			<div class="col-md-offset-2 col-md-10">
				<button type="submit" class="btn btn-info" name="btnUpdate" onclick=""><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Update</button>
				<button type="reset" class="btn btn-danger"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Cancel</button>
			</div>
		</div>
	</form>
</div>