<?php 

include_once("RoleController.php");
$sqlSelect = "SELECT `RoleId`, `RoleName`, `RoleDetails`, `RoleActive` FROM `Role`";
$list_Role= mysqli_query($conn,$sqlSelect);

?>
<h3 class="w3_inner_tittle two text-center">Management Role</h3>
<a class="btn btn-primary" href="?page=AddRole">Add <i class="fa fa-plus"></i></a> 
</br>
</br>
<table id="myTable" class="table-striped table-hover">
	<thead >
		<tr>
			<th><strong>Num</strong></th>
			<th><strong>Role Name</strong></th>
			<th><strong>Details</strong></th>
			<th><strong>Status</strong></th>
			<th><strong>Action</strong></th>
		</tr>
	</thead>
	<tbody>
		<?php 
		$num = 1;
		while(list($RoleId, $name, $details,$active) = mysqli_fetch_array($list_Role))
		{
			?>
			<tr>
				<td class="col-md-1"><?= $num;?> </td>
				<td class="col-md-3"><?= $name;?> </td>
				<td class="col-md-3"><?= $details;?> </td>
				<td class="col-md-3"><?= $active;?> </td>
				<td class="text-center col-md-6">
					<a class="btn btn-warning btn" href="?page=UpadateRole&RoleId=<?php echo $RoleId; ?>"><i class="fa fa-edit"></i></a>
					<a class='btn btn-danger' href="?page=DeleteRole&RoleId=<?php echo $RoleId; ?>" onclick="return confirm('Are you sure delete?')"><i class="fa fa-remove"></i></a>
				</td>     
			</tr>
			<?php
			$num++;
		}
		?>
	</tbody>
</table>
