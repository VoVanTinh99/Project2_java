	<?php 
	$WineId ="";
	$TimeId = "";
	$PurchasePrice ="";
	$SellingPrice = "";
	$Note = "";
	if(isset($_POST["btnAdd"]))
	{
		$WineId =$_POST["slWine"];
		$TimeId = $_POST["slTime"];
		$PurchasePrice =$_POST["txtPurchasePrice"];
		$SellingPrice = $_POST["txtSellingPrice"];
		$Note = $_POST["txtNote"];
		$result = addWinePrice($WineId,$TimeId,$PurchasePrice,$SellingPrice,$Note);
		if($result){
			echo '<script> alert("Insert Success");</script>';
			echo "<script>window.location.href='?page=PriceHistory&WineId=".$_POST["slWine"]."'</script>";
		}else{
			echo '<script> alert("Data already exists!");</script>';
			
		}
	}
	?>
	<div class="row">
		<div class="col-md-12"/>
		<form action="" method="post" accept-charset="utf-8" enctype="multipart/form-data" form-horizontal>
			<div class="form_group">
				<label class="control-label col-sm-12" for="email"><h2 align="center">Add Price</h2></label>
			</div>

		</form>
		<form class="form-horizontal" accept-charset="utf-8" method="post" role="form" >
			<div class="form-group">
				<label class="control-label col-md-2" for="slWine">Wine Names:</label>
				<div class="col-sm-10">
					<?php
					$sqlSelect = "SELECT `WineId`, `WineName` FROM `Wine`";
					$result = mysqli_query($conn,$sqlSelect);
					$selectedValue = "";
					echo "<select name='slWine' class='form-control'><option value='0'>Choice Wine</option>";
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
				<label class="control-label col-md-2" for="slTime">The time of</label>
				<div class="col-md-10">          
					<?php
					$sqlSelect = "SELECT `TimeId`, `ApplicationTime` FROM `Time`";
					$result = mysqli_query($conn,$sqlSelect);
					$selectedValue = "";
					echo "<select name='slTime' class='form-control'><option value='0'>Choice The time of</option>";
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
				<label class="control-label col-md-2" for="txtPurchasePrice">The purchase price:</label>
				<div class="col-md-10">          

					<input type="text" class="form-control" id="txtPurchasePrice" placeholder="Enter the price purchase" name="txtPurchasePrice"
					required  >
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-2" for="txtSellingPrice">Sale price:</label>
				<div class="col-md-10">          
					<input name="txtSellingPrice" class="form-control" placeholder="Enter the sale Price" required id="txtSellingPrice"></input>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-2" for="txtNote">Notes:</label>
				<div class="col-md-10">          
					<input type="text" class="form-control" id="txtNote" placeholder="Enter the notes" name="txtNote"
					required  >
				</div>
			</div>

			<div class="form-group">        
				<div class="col-md-offset-2 col-md-10">
					<button type="submit" class="btn btn-info" name="btnAdd" onclick=""><span class="glyphicon glyphicon-ok" aria-hidden="true"></span>Add</button>
					<button type="reset" class="btn btn-danger"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Cancel</button>
				</div>
			</div>
		</form>
	</div>