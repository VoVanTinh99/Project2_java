<?php 
$WineId = 0;
if(isset($_GET['WineId'])){
	$WineId=$_GET['WineId'];
	$TimeId=$_GET['TimeId'];
}
$PurchasePrice ="";
$SellingPrice = "";
$Note = "";
$result = searchWineTime($WineId, $TimeId);
	//Lấy dữ liệu đưa vào mảng
if(isset($result))
{
	list($WineId,$TimeId,$PurchasePrice,$SellingPrice,$Note)=mysqli_fetch_array($result);
}
	//Cập nhật lại dữ liệu
if(isset($_POST['btnUpdate']))
{
	$WineId =$_POST["slWine"];
	$TimeId = $_POST["slTime"];
	$PurchasePrice =$_POST["txtPurchasePrice"];
	$SellingPrice = $_POST["txtSellingPrice"];
	$Note = $_POST["txtNote"];
	updateWinePrice($WineId,$TimeId,$PurchasePrice,$SellingPrice,$Note);
	echo '<script> alert("Update success!");</script>';
	echo "<script>window.location.href='?page=PriceHistory&WineId=".$_POST["slWine"]."'</script>";
}

?>

<div class="row">
	<div class="col-md-12"/>
	<form action="" method="post" accept-charset="utf-8" enctype="multipart/form-data" form-horizontal>
		<div class="form_group">
			<label class="control-label col-sm-12" for="email"><h2 align="center">Wine Update</h2></label>
		</div>

	</form>
	<form class="form-horizontal" accept-charset="utf-8" method="post" role="form" >
		<div class="form-group">
			<label class="control-label col-md-2" for="slWine">Wine:</label>
			<div class="col-sm-10">
				<?php
				$sqlSelect = "SELECT `WineId`, `WineName` FROM `Wine`";
				$result = mysqli_query($conn,$sqlSelect);
				$selectedValue = $WineId;
				echo "<select name='slWine' class='form-control'>";
				while ($row=mysqli_fetch_array($result,MYSQLI_ASSOC)) 
				{
					if($row['WineId'] == $selectedValue)
					{
						echo "<option value='".$row['WineId']."' selected>".$row['WineName']."</option>";
					}
					else
					{
						echo "<option value='".$row['WineId']."'>".$row['WineName']."</option>";
					}

				}
				echo "</select>";
				?>
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-md-2" for="slTime">Time</label>
			<div class="col-md-10">          
				<?php
				$sqlSelect = "SELECT `TimeId`, `ApplicationTime` FROM `Time`";
				$result = mysqli_query($conn,$sqlSelect);
				$selectedValue = $TimeId;
				echo "<select name='slTime' class='form-control'>";
				while ($row=mysqli_fetch_array($result,MYSQLI_ASSOC)) 
				{
					if($row['TimeId'] == $selectedValue)
					{
						echo "<option value='".$row['TimeId']."' selected>".$row['ApplicationTime']."</option>";
					}
					else
					{
						echo "<option value='".$row['TimeId']."'>".$row['ApplicationTime']."</option>";
					}

				}
				echo "</select>";
				?>
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-md-2" for="txtPurchasePrice">Wine of purchase:</label>
			<div class="col-md-10">          

				<input type="text" class="form-control" id="txtPurchasePrice" name="txtPurchasePrice" value="<?=$PurchasePrice?>"
				required  >
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-md-2" for="txtSellingPrice">Wine sale:</label>
			<div class="col-md-10">          
				<input name="txtSellingPrice" class="form-control"  value="<?=$SellingPrice?>" required id="SellingPrice"></input>
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-md-2" for="txtNote">Note:</label>
			<div class="col-md-10">           
				<input type="text" class="form-control" id="txtNote"  name="txtNote" value="<?=$Note?>"
				required  >
			</div>
		</div>

		<div class="form-group">        
			<div class="col-md-offset-2 col-md-10">
				<button type="submit" class="btn btn-info" name="btnUpdate" onclick=""><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Update</button>
				<button type="reset" class="btn btn-danger"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span>Cancel</button>
			</div>
		</div>
	</form>
</div>