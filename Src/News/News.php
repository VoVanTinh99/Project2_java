<?php 
$conn = mysqli_connect("localhost","root","","a_huy");
mysqli_set_charset($conn,'utf8');
include_once("NewsController.php");
$sqlSelect = "SELECT `NewsId`, `NewsNames`, `Title`, `NewsContent`, `EmployeeCode` FROM `news`";
$list_News= mysqli_query($conn,$sqlSelect);

?>

<h3 class="w3_inner_tittle two text-center">Management News</h3>
<a class="btn btn-primary" href="?page=AddNews">Add<i class="fa fa-plus"></i></a> 
<br>
<br>
<table id="myTable" class="table-striped table-hover">
	<thead >
		<tr>
			<th><strong>Num</strong></th>
			<th><strong>News</strong></th>
			<th><strong>Title</strong></th>
			<th><strong>Content</strong></th>
			<th><strong>Employee</strong></th>
			<th><strong>Action</strong></th>
		</tr>
	</thead>
	<tbody>
		<?php 
		$num = 1;
		while(list($NewsId, $Newsname, $title,$content,$employeecode) = mysqli_fetch_array($list_News))
		{
			?>
			<tr>
				<td class="col-md-1"><?= $NewsId;?> </td>
				<td class="col-md-1"><?= $Newsname;?> </td>
				<td class="col-md-2"><?= $title;?> </td>
				<td class="col-md-4"><?= $content;?> </td>
				<?php 
				$sql = "SELECT  `EmployeeName` FROM `employee` WHERE `EmployeeCode`='$employeecode'";
				$kq= mysqli_query($conn,$sql);
				while (list($EmployeeName) = mysqli_fetch_array($kq)){
					echo '	<td class="col-md-2">'.$EmployeeName.'</td>';
				}
				
				?>
				<td class="text-center col-md-6">
				<a class='btn btn-success' href="?page=UploadImageNews&NewsId=<?=$NewsId?>">
						<i class="fa fa-file-image-o"></i></a>
					<a class="btn btn-warning btn" href="?page=UpdateNews&NewsId=<?php echo $NewsId; ?>"><i class="fa fa-edit"></i></a>
					<a class='btn btn-danger' href="?page=DeleteNews&NewsId=<?php echo $NewsId; ?>" onclick="return confirm('Are you sure delete?')"><i class="fa fa-remove"></i></a>
				</td>     
			</tr>
			<?php
			$num++;
		}
		?>
	</tbody>
</table>
