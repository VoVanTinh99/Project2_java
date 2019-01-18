<?php 
		$conn = mysqli_connect("localhost","root","","a_huy");
		mysqli_set_charset($conn,'utf8');
$sqlSelect = "SELECT `UserName`, `FullName`, `Sex`, `Address`, `Phone`, `Email`, `DateOfBirth`, `Status`, `Role` FROM `user`";
$list_User= mysqli_query($conn,$sqlSelect);

?>
<h3 class="w3_inner_tittle two text-center">Management User</h3>

<table id="myTable" class="table-striped table-hover">
	<thead >
		<tr>
			<th><strong>NO</strong></th>
			<th><strong>Username</strong></th>
			<th><strong>Full Names</strong></th>
			<th><strong>Gender</strong></th>
			<th><strong>Address</strong></th>
			<th><strong>Phone Number</strong></th>
			<th><strong>Email</strong></th>
			<th><strong>Date of Birth</strong></th>
			<th><strong>Role</strong></th>
			<th><strong>Status</strong></th>
			<th><strong>Close/Open</strong></th>
			<th><strong>Action</strong></th>
		</tr>
	</thead>
	<tbody>
		<?php 
		$num = 1;
		while(list($UserId,$FullName, $Sex,$address,$phone,$email,$date,$status,$roleId) = mysqli_fetch_array($list_User))
		{
			?>
			<tr>
				<td class="col-md-1"><?= $num;?> </td>
				<td class="col-md-3"><?= $UserId;?> </td>
				<td class="col-md-3"><?= $FullName;?> </td>
				<td class="col-md-2"><?= ($Sex == 1) ? "Boy" : "Girl"; ?> </td>
				<td class="col-md-6"><?= $address;?> </td>
				<td class="col-md-6"><?= $phone;?> </td>
				<td class="col-md-6"><?= $email;?> </td>
				<td class="col-md-6"><?= $date;?> </td>
				<?php 
				$result = searchRole($roleId);
				if(isset($result))
				{
					list($roleId,$roleName)=mysqli_fetch_array($result);
					
				} ?>
				<td class="col-md-2"><?= $roleName;?></td>	
				<td class="col-md-6">
					<?php 
						if($status==1){
							echo 'Active';
						}else{
							echo 'No Active';
						}
					?>
					
				</td>
				<td class="col-md-6" >
					<form  method="post" action="">
					<?php 
						if($status==1){
							echo '<a class="btn btn-danger" href="?page=ActiveUser&Status='.$status.'&UserId='.$UserId.'">Open</a>';
						}else{
							echo '<a class="btn btn-primary" href="?page=ActiveUser&Status='.$status.'&UserId='.$UserId.'">Close</a>';
						}
					?>
				</form>
				</td>
				<td class="text-center col-md-2">
					<a class='btn btn-danger' href="?page=DeleteUser&UserId=<?php echo $UserId; ?>" onclick="return confirm('Are you sure delete?')"><i class="fa fa-remove"></i></a>
				</td>     
			</tr>
			<?php
			$num++;
		}
		?>
	</tbody>
</table>
