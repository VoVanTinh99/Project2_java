<script type="text/javascript">
	function deleteConfirm()
	{
		if(confirm("Bạn có chắc chắn muốn xóa!")){
			return true;
		}
		else{
			return false;
		}
	}
</script>
<?php 
$conn = mysqli_connect("localhost","root","","a_huy");
mysqli_set_charset($conn,'utf8');
if(isset($_GET["ma"]))
{
	$mavechungtoi = $_GET["ma"];
	mysqli_query($conn,"DELETE FROM `about` WHERE AboutId=$mavechungtoi");
}
?>
<?php
if (isset($_POST['btnXoa'])&&isset($_POST['checkbox'])) 
{
	for ($i = 0; $i < count($_POST['checkbox']); $i++) 
	{
		$mavechungtoi1 = $_POST['checkbox'][$i];
		mysqli_query($conn,"DELETE FROM `about` WHERE AboutId=$mavechungtoi1");
	}
}
?>
<h3 class="w3_inner_tittle two text-center">About</h3>
<a class="btn btn-primary" href="?page=AddAbout">Add <i class="fa fa-plus"></i></a> 
<br>
<br>
	<form name="frmXoa" method="post">
		<table id="myTable" class="table-striped table-hover table-responsive">
			<thead >
				<tr>
					<th><strong>Choice</strong></th>
					<th><strong>No</strong></th>
					<th><strong>About us</strong></th>
					<th><strong>Content</strong></th>
					<th><strong>Employee</strong></th>	
					<th><strong>Action</strong></th>
				</tr>
			</thead>
			<tbody>
				<?php

				$result = mysqli_query($conn,
					"SELECT `AboutId`,`AboutName`, `AboutWinsor`, `EmployeeName` 
					FROM `about` a
					JOIN employee em ON a.EmployeeCode = em.EmployeeCode");
				$num = 1;
				while($row = mysqli_fetch_array($result))
				{
					?>
					<tr>
						<td class="col-md-1"><input name="checkbox[]" type="checkbox" id="checkbox[]" value="<?php echo $row["AboutId"] ?>"></td>
						<td class="col-md-1"><?php echo $num ?></td>
						<td class="col-md-3"><?php echo $row["AboutName"] ?></td>
						<td class="col-md-3"><?php echo $row["AboutWinsor"] ?></td>
						<td class="col-md-1"><?php echo $row["EmployeeName"] ?></td>

						<td class="col-md-3">
							<a class='btn btn-success' href="?page=UploadImageAbout&&AboutId=<?=$row["AboutId"]?>">
						<i class="fa fa-file-image-o"></i></a>
							<a class="btn btn-danger" href="?page=about&ma=<?php echo $row['AboutId']; ?>" onclick="return deleteConfirm()">
								<i class="fa fa-remove"></i></a>
								<a class="btn btn-success" href="?page=UpdateAbout&AboutId= <?php echo $row['AboutId']; ?>"><i class="fa fa-edit"></i></a>
							</td>
						</tr>
						<?php
						$num++;
					}
					?>
				</tbody>
			</table>
		</form>
	</div>