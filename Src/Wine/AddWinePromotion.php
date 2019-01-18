	<?php 
	if(isset($_POST["btnAdd"]))
	{
		$WineId = $_POST['slWine'];
		$PromotionId = $_POST['slPromotion'];
		$result = addWinePromotion($WineId, $PromotionId);
		if($result){
			echo '<script> alert("Insert success);</script>';
			echo "<script>window.location.href='?page=PromotionHistory'</script>";
		}else{
			echo '<script> alert("Data already exists ");</script>';
		}
	}
	?>

	<div class="row">
		<div class="col-md-12"/>
		<form class="form-horizontal" accept-charset="utf-8" method="post" role="form" >
			<div class="form-group">
				<label class="control-label col-md-2" for="txtWineName">Wine:</label>
				<div class="col-sm-10">
					<?php 
					$sqlString="SELECT `WineId`, `WineName` FROM `wine`";
					$sqlresult = mysqli_query($conn,$sqlString);
					echo "<select name='slWine' class='form-control'><option value='0'>Please choice wine name</option>";

					while ($row = mysqli_fetch_array($sqlresult,MYSQLI_ASSOC)) {
						echo "<option value='".$row['WineId']."'>".$row['WineName']."</option>";

					}
					echo "</select>";
					?>
				</div>
			</div> 
			<div class="form-group">
				<label class="control-label col-md-2" for="txtPromotionName">The program applies:</label>
				<div class="col-sm-10">
					<?php 
					$sqlString="SELECT `PromotionId`, `PromotionName` FROM `promotion`";
					$sqlresult = mysqli_query($conn,$sqlString);
					echo "<select name='slPromotion' class='form-control'><option value='0'>Please choice the program applies</option>";

					while ($row = mysqli_fetch_array($sqlresult,MYSQLI_ASSOC)) {
						echo "<option value='".$row['PromotionId']."'>".$row['PromotionName']."</option>";

					}
					echo "</select>";
					?>
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