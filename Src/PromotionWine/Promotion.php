


<?php

include_once("PromotionController.php");
$sqlSelect = "SELECT `PromotionId`, `PromotionName`, `PromotionDiscount`, `PromotionContent`, `PromotionActive`, `PromotionClose`, `PromotionOpen` FROM `Promotion`";
$list_Promotion= mysqli_query($conn,$sqlSelect);

?>
<h3 class="w3_inner_tittle two text-center">Manage Promotion</h3>
<a class="btn btn-primary" href="?page=AddPromotion">Addd<i class="fa fa-plus"></i></a>
<br/>
<br/>
<table id="myTable" class="table-striped table-hover">
	<thead >
		<tr>
			<th><strong>Num</strong></th>
			<th><strong>Promotion Name</strong></th>
			<th><strong>Discount</strong></th>
			<th><strong>Details</strong></th>
			<th><strong>Start</strong></th>
			<th><strong>End</strong></th>
			<th><strong>Status</strong></th>
			<th><strong>Action</strong></th>
		</tr>
	</thead>
	<tbody>
		<?php
		$num = 1;
		while(list($PromotionId, $name, $discount, $content, $active, $close, $open) = mysql_fetch_array($list_Promotion))
		{
			?>
			<tr>
				<td class="col-md-1"><?= $num;?> </td>
				<td class="col-md-2"><?= $name;?> </td>
				<td class="col-md-1"><?= $discount;?> </td>
				<td class="col-md-3"><?= $content;?> </td>
				<td class="col-md-1"><?= $active;?> </td>
				<td class="col-md-1"><?= $close;?> </td>
				<td class="col-md-1" style="text-align:center;">
					<?= ($open == 0) ? '<a class="btn btn-default" title="Stop. Click to star promotion!" href="?page=ChangeActive&PromotionId='.$PromotionId.'&Do=OK"><span class="glyphicon glyphicon-ok" style="color:blue;"></span></a>' : '<a class="btn btn-default" title="Active. Click to stop promotion!" href="?page=ChangeActive&PromotionId='.$PromotionId.'&Do=Remove"><span class="glyphicon glyphicon-remove" style="color:red;"></span></a>';?>
				</td>
				<td class="text-center col-md-12">
					<a class="btn btn-warning" href="?page=UpdatePromotion&PromotionId=<?php echo $PromotionId; ?>"><i class="fa fa-edit"></i></a>
					<a class='btn btn-danger' href="?page=DeletePromotion&PromotionId=<?php echo $PromotionId; ?>" onclick="return confirm('Are you sure delete?')"><i class="fa fa-remove"></i></a>
				</td>
			</tr>
			<?php
			$num++;
		}
		?>
	</tbody>
</table>
