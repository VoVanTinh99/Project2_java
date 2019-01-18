<?php 
$WineId = 0;
if(isset($_GET['WineId']))
	$WineId=$_GET['WineId'];
$name ="";
$strength = "";
$shortdetails ="";
$details = "";
$wineupdate = date_default_timezone_set('Asia/Vientiane');
$quantity = "";
$idCat = "";
$idPub = "";
$idCountry = "";
$result = searchWine($WineId);
	//Lấy dữ liệu đưa vào mảng
if(isset($result))
{
	list($WineId,$name,$strength,$shortdetails,$details,$wineupdate,$quantity ,$idCat,$idPub ,$idCountry )=mysqli_fetch_array($result);
}
	//Cập nhật lại dữ liệu
if(isset($_POST['btnUpdate']))
{
	$WineId=$_GET['WineId'];
	$name = $_POST['txtName'];
	$strength = $_POST['txtstrength'];
	$shortdetails =$_POST['txtShort'];
	$details = $_POST['txtDetails'];
	$wineupdate = date('Y-m-d',  strtotime($_POST['txtDate']));
	$quantity = $_POST['txtNum'];
	$idCat = $_POST['slCategory'];
	$idPub = $_POST['slPublisher'];
	$idCountry = $_POST['slCountry'];
	updateWine($WineId,$name,$strength,$shortdetails,$details,$wineupdate,$quantity,$idCat, $idPub,$idCountry);
	echo '<script> alert("Cập nhật thành công!");</script>';
	echo "<script>window.location.href='?page=wine'</script>";
}

?>

<div class="row">
	<div class="col-md-12"/>
	<form action="" method="post" accept-charset="utf-8" enctype="multipart/form-data" form-horizontal>
		<div class="form_group">
			<label class="control-label col-sm-12" for="email"><h2 align="center">Update Wine</h2></label>
		</div>

	</form>
	<form class="form-horizontal" accept-charset="utf-8" method="post" role="form" >
		<div class="form-group">
			<label class="control-label col-md-2" for="txtName">No:</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" id="WineId"  name="WineId"
				readonly="readonly" value="<?php echo $WineId;?>" >
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-md-2" for="txtName">Wine names:</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" id="wineName" name="wineName" value="<?php echo $name; ?>" >
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-md-2" for="txtstrength">Strong:</label>
			<div class="col-md-10">          

				<input type="text" class="form-control" id="txtstrength" name="txtstrength" value="<?=$strength; ?>" 
				required  >
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-md-2" for="txtShort">Short Details:</label>
			<div class="col-md-10">          
				<input type="text" class="form-control" id="txtShort" name="txtShort" value="<?=$shortdetails; ?>"
				required  >
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-md-2" for="txtDetails">Details:</label>
			<div class="col-md-10">          
				<textarea name="txtDetails" class="form-control"  required><?=$details; ?></textarea>
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-md-2" for="txtNum">Quantity:</label>
			<div class="col-md-10">          
				<input type="text" class="form-control" id="txtNum"  name="txtNum" value="<?php echo $quantity ; ?>"
				required  >
			</div>
		</div>

		<div class="form-group">
			<label class="control-label col-md-2" for="slPublisher">Producer:</label>
			<div class="col-md-10">          
				<?php
				$sqlSelect = "SELECT `PublisherId`, `PublisherName`, `PublisherDescription` FROM `publisher`";
				$result = mysqli_query($conn,$sqlSelect);
				$selectedValue = $idPub;
				echo "<select name='slPublisher' class='form-control'>";
				while ($row=mysqli_fetch_array($result,MYSQLI_ASSOC)) 
				{
					if($row['PublisherId'] == $selectedValue)
					{
						echo "<option value='".$row['PublisherId']."' selected>".$row['PublisherName']."</option>";
					}
					else
					{
						echo "<option value='".$row['PublisherId']."'>".$row['PublisherName']."</option>";
					}

				}
				echo "</select>";
				?>
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-md-2" for="slCategory">Category:</label>
			<div class="col-md-10">          
				<?php
				$sqlSelect = "SELECT `CategoryId`, `CategoryName`, `CategoryDescription` FROM `category`";
				$result = mysqli_query($conn,$sqlSelect);
				$selectedValue = $idCat;
				echo "<select name='slCategory' class='form-control'>";
				while ($row=mysqli_fetch_array($result,MYSQLI_ASSOC)) 
				{
					if($row['CategoryId'] == $selectedValue)
					{
						echo "<option value='".$row['CategoryId']."' selected>".$row['CategoryName']."</option>";
					}
					else
					{
						echo "<option value='".$row['CategoryId']."'>".$row['CategoryName']."</option>";
					}

				}
				echo "</select>";
				?>
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-md-2" for="slCountry">Origin:</label>
			<div class="col-md-10">          
				<?php
				$sqlSelect = "SELECT `CountryId`, `CountryName`, `CountryDetails` FROM `country`";
				$result = mysqli_query($conn,$sqlSelect);
				$selectedValue = $idCountry;
				echo "<select name='slCountry' class='form-control'>";
				while ($row=mysqli_fetch_array($result,MYSQLI_ASSOC)) 
				{
					if($row['CountryId'] == $selectedValue)
					{
						echo "<option value='".$row['CountryId']."' selected>".$row['CountryName']."</option>";
					}
					else
					{
						echo "<option value='".$row['CountryId']."'>".$row['CountryName']."</option>";
					}

				}
				echo "</select>";
				?>
			</div>
			
		</div>
		<div class="form-group">
			<label class="control-label col-md-2" for="txtDate">Update date:</label>
			<div class="col-md-10">          
				<input type="date" class="form-control" id="txtDate" name="txtDate"
				required  value="<?php echo $wineupdate; ?>">
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