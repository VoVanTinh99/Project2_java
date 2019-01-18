<?php
	$conn = mysqli_connect("localhost","root","","a_huy");
	mysqli_set_charset($conn,'utf8');
?>
<?php
	$conn = mysqli_connect("localhost","root","","a_huy");
	mysqli_set_charset($conn,'utf8');
	$sqlSelect="SELECT `EmployeeCode`, `EmployeeName`, `EmployeeBirth`, `EmployeeAddress`, `EmployeeEmail`, `EmployeeIC`, `RoleId` FROM employee";
	$list_employee= mysqli_query($conn,$sqlSelect);
?>
<h3 class="w3_inner_tittle two text-center">Staff Management</h3>
<a class="btn btn-primary" href="?page=AddEmployee">Add <i class="fa fa-plus"></i></a>
<a class="btn btn-primary" href="?page=iof&iof=importemployee">Import Employee <i class="fa fa-cloud-upload"></i></a>
<a class="btn btn-primary" href="../Src/InputOutputFile/OutputFileEmployee.php">Export Employee <i class="fa fa-cloud-download"></i></a>
<br>
<br>
<table id="myTable" class="table-striped table-hover">
	<thead >
		<tr>
			<th><strong>No</strong></th>
			<th><strong>Employee Code</strong></th>
			<th><strong>Full Names</strong></th>
			<th><strong>Date of Birth</strong></th>
			<th><strong>Address</strong></th>
			<th><strong>Email</strong></th>
			<th><strong>IC</strong></th>
			<th><strong>Role</strong></th>
			<th><strong>Action</strong></th>
		</tr>
	</thead>
	<tbody>
		<?php
			$conn = mysqli_connect("localhost","root","","a_huy");
			mysqli_set_charset($conn,'utf8');
		$num = 1;
		while(list($empCode,$empName,$empBrith,$empAddress,$empMail,$empIC,$empRole) = mysqli_fetch_array($list_employee))
		{
			?>
			<tr>
				<td class="col-md-1"><?= $num;?> </td>
				<?php
					$conn = mysqli_connect("localhost","root","","a_huy");
					mysqli_set_charset($conn,'utf8');
				$result = searchRole($empRole);
				if(isset($result))
				{
					list($RoleId,$RoleName)=mysqli_fetch_array($result);
					$empRole = $RoleName;
				} ?>
				<td class="col-md-1"><?= $empCode;?> </td>

				<td class="col-md-1"><?= $empName;?> </td>
				<td class="col-md-1"><?= $empBrith;?> </td>
				<td class="col-md-3"><?= $empAddress;?> </td>
				<td class="col-md-1"><?= $empMail;?> </td>
				<td class="col-md-1"><?= $empIC?> </td>
				<td class="col-md-1"><?= $empRole?> </td>
				<td class="text-center col-md-3">
					<a class='btn btn-success' href="?page=UploadImageEmployee&&empCode=<?=$empCode?>">
						<i class="fa fa-file-image-o"></i></a>
						<a class="btn btn-warning btn" href="?page=UpadateEmployee&empCode=<?php echo $empCode; ?>"><i class="fa fa-edit"></i></a>
						<a class='btn btn-danger' href="?page=DeleteEmployee&empCode=<?php echo $empCode; ?>" onclick="return confirm('Are you sure delete?')"><i class="fa fa-remove"></i></a>
				</td>
				</tr>
				<?php
				$num++;
			}
			?>
		</tbody>
	</table>
