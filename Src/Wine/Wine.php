<?php
$sql="SELECT WineId, WineName, WineStrength, WineUpdateDate,WineQuantity, wine.CategoryId, wine.PublisherId, wine.CountryId FROM wine, category, country, publisher WHERE wine.CategoryId = category.CategoryId AND wine.PublisherId = publisher.PublisherId AND wine.CountryId = country.CountryId";
$listwine = mysqli_query($conn,$sql);
?>
<h3 class="w3_inner_tittle two text-center">Wine Management</h3>
<a class="btn btn-primary" href="?page=AddWine">Add Wine <i class="fa fa-plus"></i></a>
<a class="btn btn-primary" href="?page=iof&iof=importwine">Import Wine <i class="fa fa-cloud-upload"></i></a>
<a class="btn btn-primary" href="../Src/InputOutputFile/OutputFileWine.php">Export Wine <i class="fa fa-cloud-download"></i></a>
<br>
<br>
<table id="myTable" class="table-striped table-hover">
	<thead >
		<tr>
			<th><strong>Num</strong></th>
			<th><strong>Wine</strong></th>
			<th><strong>Concentration</strong></th>
			<th><strong>Update day</strong></th>
			<th><strong>Quantity</strong></th>
			<th><strong>Category</strong></th>
			<th><strong>Producer</strong></th>
			<th><strong>Origin</strong></th>
			<th><strong>Action</strong></th>
		</tr>
	</thead>
	<tbody>
		<?php
		$num = 1;
		while(list($WineId,$name,$strength,$wineupdate,$quantity,$idCat, $idPub,$idCountry) = mysqli_fetch_array($listwine))
		{
			?>
			<tr>
				<td class="col-md-1"><?= $num;?> </td>
				<td class="col-md-1"><?= $name;?> </td>
				<td class="col-md-1"><?= $strength;?> </td>
				<td class="col-md-1"><?= $wineupdate;?> </td>
				<td class="col-md-1"><?= $quantity;?> </td>
				<?php
				$result = searchCategory($idCat);
				if(isset($result))
				{
					list($CategoryId,$CategoryName)=mysqli_fetch_array($result);
				} ?>
				<td class="col-md-1"><?= $CategoryName?> </td>
				<?php
				$result = searchPublisher($idPub);
				if(isset($result))
				{
					list($PublisherId,$PublisherName)=mysqli_fetch_array($result);
				} ?>
				<td class="col-md-1"><?= $PublisherName?> </td>
				<?php
				$result = searchCountry($idCountry);
				if(isset($result))
				{
					list($CountryId,$CountryName)=mysqli_fetch_array($result);
				} ?>
				<td class="col-md-1"><?= $CountryName?> </td>
				<td class="text-center col-md-2">
					<a class='btn btn-success' href="?page=UploadImageWine&&WineId=<?=$WineId?>">
						<i class="fa fa-file-image-o"></i></a>
					<a class="btn btn-warning" href="?page=UpdateWine&WineId=<?php echo $WineId; ?>"><i class="fa fa-edit"></i></a>
					<a class='btn btn-danger' href="?page=DeleteWine&WineId=<?php echo $WineId; ?>" onclick="return confirm('Are you sure delete?')"><i class="fa fa-remove"></i></a>
					<a class="btn btn-info" href="?page=PriceHistory&WineId=<?php echo $WineId; ?>"><i class="fa fa-money"></i></a>
					<a class="btn btn-primary" href="?page=PromotionHistory&WineId=<?php echo $WineId; ?>"><i class="fa fa-gift"></i></a>
				</td>
			</tr>
			<?php
			$num++;
		}
		?>
	</tbody>
</table>
