<?php 
$name ="";
$strength = "";
$shortdetails ="";
$details = "";
$wineupdate = date_default_timezone_set('Asia/Vientiane');
$quantity = "";
$idCat = "";
$idPub = "";
$idCountry = "";
if(isset($_POST["btnAdd"]))
{
	$name = $_POST["txtName"];
	$strength = $_POST["txtstrength"];
	$shortdetails = $_POST["txtShort"];
	$details = $_POST["txtDetails"];
	$wineupdate =date('Y-m-d',  strtotime($_POST['txtDate']));
	$quantity=$_POST["txtNum"];
	$idCat = $_POST["slCategory"];
	$idPub = $_POST["slPublisher"];
	$idCountry =$_POST["slCountry"];
	$result = addWine($name,$strength,$shortdetails,$details,$wineupdate,$quantity,$idCat, $idPub,$idCountry);
	if($result){
		echo '<script> alert("Insert Success");</script>';
		echo "<script>window.location.href='?page=wine'</script>";
	}else{
		echo '<script> alert("Dữ liệu đã tồn tại");</script>';
	}
}
?>
<div class="row">
	<div class="col-md-12"/>
	<form action="" method="post" accept-charset="utf-8" enctype="multipart/form-data" form-horizontal>
		<div class="form_group">
			<label class="control-label col-sm-12" for="email"><h2 align="center">Add Wine</h2></label>
		</div>
	</form>
	<form class="form-horizontal" accept-charset="utf-8" method="post" role="form" >
		<div class="form-group">
			<label class="control-label col-md-2" for="txtName">Wine Name:</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" id="txtName" placeholder="Enter the name of the wine" name="txtName"
				required autofocus="" >
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-md-2" for="txtstrength">Strong:</label>
			<div class="col-md-10">          

				<input type="text" class="form-control" id="txtstrength" placeholder="Enter the concentration of alcohol" name="txtstrength"
				required  >
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-md-2" for="txtShort">Short Details:</label>
			<div class="col-md-10">          

				<input type="text" class="form-control" id="txtShort" placeholder="Enter short description" name="txtShort"
				required  >
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-md-2" for="txtDetails">Detailed description:</label>
			<div class="col-md-10">          


				<textarea name="txtDetails" class="form-control" placeholder="Enter description" required></textarea>
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-md-2" for="txtNum">Quantity:</label>
			<div class="col-md-10">          
				<input type="text" class="form-control" id="txtNum" placeholder="Enter the number of wine" name="txtNum"
				required  >
			</div>
		</div>

		<div class="form-group">
			<label class="control-label col-md-2" for="slPublisher">Producer:</label>
			<div class="col-md-10">          
				<?php
				blindListPublisher();
				?>
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-md-2" for="slPublisher">Category:</label>
			<div class="col-md-10">          
				<?php
				blindListCategory();
				?>
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-md-2" for="slPublisher">Origin:</label>
			<div class="col-md-10">          
				<?php
				blindListCountry();
				?>
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-md-2" for="txtDate">Date:</label>
			<div class="col-md-10">          
				<input type="date" class="form-control" id="txtDate" name="txtDate"
				required  >
			</div>
		</div>
		<div class="form-group">        
			<div class="col-md-offset-2 col-md-10">
				<button type="submit" class="btn btn-info" name="btnAdd"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Add</button>
				<button type="reset" class="btn btn-danger"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span>Cancel</button>
			</div>
		</div>
	</form>
</div>