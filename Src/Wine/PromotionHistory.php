<?php 
if(isset($_GET['WineId'])){
	$sql="SELECT WineId, PromotionId FROM promotion_wine where WineId = '".$_GET['WineId']."'";
	$promotionhistory = mysqli_query($conn,$sql);
}else{
	$sql="SELECT WineId, PromotionId FROM promotion_wine";
	$promotionhistory = mysqli_query($conn,$sql);
}
?>
<h3 class="w3_inner_tittle two text-center">History Promotion</h3>
<a class="btn btn-primary" href="?page=AddWinePromotion">Add <i class="fa fa-plus"></i></a> 
<br>
<br>
<table id="myTable" class="table-striped table-hover">
	<thead >
		<tr>
			<th><strong>Num</strong></th>
			<th><strong>Wine Name</strong></th>
			<th><strong>Promotion</strong></th>
			<th><strong>Discount rate</strong></th>
			<th><strong>Date Open</strong></th>
			<th><strong>Date Close</strong></th>
		</tr>
	</thead>
	<tbody>
		<?php 
		$num = 1;
		while(list($WineId,$PromotionId) = mysqli_fetch_array($promotionhistory))
		{
			?>
			<tr>
				<td class="col-md-1"><?= $num;?> </td>
				<?php 
				$result = searchWine($WineId);
				if(isset($result))
				{
					list($WineId,$WineName)=mysqli_fetch_array($result);
				} ?>
				<td class="col-md-1"><?= $WineName;?> </td>
				<?php 
				$result = searchPromotion($PromotionId);
				if(isset($result))
				{
					list($PromotionId,$PromotionName, $PromotionDiscount, $PromotionActive, $PromotionClose, $PromotionOpen)=mysqli_fetch_array($result);
				} ?>
				<td class="col-md-1"><?= $PromotionName;?> </td>
				<td class="col-md-1"><?= $PromotionDiscount;?> </td>
				<td class="col-md-1"><?= $PromotionOpen;?> </td>
				<td class="col-md-1"><?= $PromotionClose;?> </td>
			</tr>
			<?php
			$num++;
		}
		?>
	</tbody>
</table>