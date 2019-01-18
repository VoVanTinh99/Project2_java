<?php 
$sqlSelect = "SELECT `TimeId`, `ApplicationTime` FROM `time`";
$list_Time= mysqli_query($conn,$sqlSelect);

?>
<h3 class="w3_inner_tittle two text-center">Manage Time</h3>
<a class="btn btn-primary" href="?page=AddTime">Add <i class="fa fa-plus"></i></a> 
<br>
<br>
<table id="myTable" class="table-striped table-hover">
	<thead >
		<tr>
			<th><strong>Num</strong></th>
			<th><strong>Time</strong></th>
			<th><strong>Action</strong></th>
		</tr>
	</thead>
	<tbody>
		<?php 
		$num = 1;
		while(list($TimeId, $applicationTime) = mysqli_fetch_array($list_Time)){
			?>
			<tr>
				<td class="col-md-1"><?= $num;?> </td>
				<td class="col-md-3"><?= $applicationTime;?> </td>
				<td class="text-center col-md-2">
					<a class="btn btn-warning btn" href="?page=UpadateTime&TimeId=<?=$TimeId?>"><i class="fa fa-edit"></i></a>
					<a class='btn btn-danger' href="?page=DeleteTime&TimeId=<?=$TimeId?>" onclick="return confirm('Are you sure delete?')"><i class="fa fa-remove"></i></a>
				</td>     
			</tr>
			<?php
			$num++;
		}
		?>
	</tbody>
</table>