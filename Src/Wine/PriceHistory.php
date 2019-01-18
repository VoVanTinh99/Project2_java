<?php 
if(isset($_GET['WineId'])){
	$sql="SELECT WineId, TimeId, PurchasePrice, SellingPrice, Note FROM time_wine where WineId = '".$_GET['WineId']."'";
	$pricehistory = mysqli_query($conn,$sql);
}else{
	$sql="SELECT WineId, TimeId, PurchasePrice, SellingPrice, Note FROM time_wine";
	$pricehistory = mysqli_query($conn,$sql);
}
?>
<h3 class="w3_inner_tittle two text-center">History Price</h3>
<a class="btn btn-primary" href="?page=AddWinePrice">Add <i class="fa fa-plus"></i></a> 
<br>
<br>
<table id="myTable" class="table-striped table-hover">
	<thead >
		<tr>
			<th><strong>Num</strong></th>
			<th><strong>Wine Name</strong></th>
			<th><strong>Location</strong></th>
			<th><strong>The purchase price</strong></th>
			<th><strong>Sale price</strong></th>
			<th><strong>Notes</strong></th>
			<th><strong>Action</strong></th>
		</tr>
	</thead>
	<tbody>
		<?php 
		$num = 1;
		while(list($WineId,$TimeId, $PurchasePrice, $SellingPrice, $Note) = mysqli_fetch_array($pricehistory))
		{
			?>
			<tr>
				<td class="col-md-1"><?= $num;?> </td>
				<?php 
				$result = searchWine($WineId);
				if(isset($result))
				{
					list($WineId,$WineName)=mysqli_fetch_array($result) or trigger_error(mysqli_error().$result);
				} ?>
				<td class="col-md-1"><?= $WineName;?> </td>
				<?php 
				$result = searchTime($TimeId);
				if(isset($result))
				{
					list($TimeId,$ApplicationTime)=mysqli_fetch_array($result);
				} ?>
				<td class="col-md-1"><?= $ApplicationTime;?> </td>
				<td class="col-md-1"><?= $PurchasePrice;?> </td>
				<td class="col-md-1"><?= $SellingPrice;?> </td>
				<td class="col-md-1"><?= $Note;?> </td>
				<td class="text-center col-md-1">
					<a class='btn btn-warning' href="?page=UpdateWinePrice&WineId=<?=$WineId; ?>&&TimeId=<?=$TimeId?>"><i class="fa fa-edit"></i></a>
					<a class="btn btn-danger" href="?page=DeleteWinePrice&WineId=<?=$WineId; ?>&&TimeId=<?=$TimeId?>" onclick="return confirm('Are you sure delete?')"><i class="fa fa-remove"></i></a>
				</td>     
			</tr>
			<?php
			$num++;
		}
		?>
	</tbody>
</table>