

<?php 

include_once("CategoryController.php");
$sqlSelect = "SELECT `CategoryId`, `CategoryName`, `CategoryDescription` FROM Category";
$list_category= mysqli_query($conn,$sqlSelect);

?>
<h3 class="w3_inner_tittle two text-center">Management of category</h3>
<a class="btn btn-primary" href="?page=AddCategory">Add Category <i class="fa fa-plus"></i></a> 
<br>
<br>
<table id="myTable" class="table-striped table-hover">
	<thead >
		<tr>
			<th><strong>Num</strong></th>
			<th><strong>Category</strong></th>
			<th><strong>Details</strong></th>
			<th><strong>Action</strong></th>
		</tr>
	</thead>
	<tbody>
		<?php 
		$num = 1;
		while(list($CategoryId, $name, $details) = mysqli_fetch_array($list_category))
		{
			?>
			<tr>
				<td class="col-md-1"><?= $num;?> </td>
				<td class="col-md-3"><?= $name;?> </td>
				<td class="col-md-6"><?= $details;?> </td>
				<td class="text-center col-md-2">
					<a class="btn btn-warning btn" href="?page=UpadateCategory&CategoryId=<?php echo $CategoryId; ?>"><i class="fa fa-edit"></i></a>
					<a class='btn btn-danger' href="?page=DeleteCategory&CategoryId=<?php echo $CategoryId; ?>" onclick="return confirm('Are you sure deleting record?')"><i class="fa fa-remove"></i></a>
				</td>     
			</tr>
			<?php
			$num++;
		}
		?>
	</tbody>
</table>
