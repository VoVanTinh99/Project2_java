<?php 

include_once("PublisherController.php");
$sqlSelect = "SELECT `PublisherId`, `PublisherName`, `PublisherDescription` FROM `Publisher`";
$list_publisher= mysqli_query($conn,$sqlSelect);

?>

<h3 class="w3_inner_tittle two text-center">Management of producer</h3>
<a class="btn btn-primary" href="?page=AddPublisher">Add <i class="fa fa-plus"></i></a> 
</br>
</br>
<table id="myTable" class="table-striped table-hover ">
	<thead >
		<tr>
			<th><strong>No</strong></th>
			<th><strong>Producer Names</strong></th>
			<th><strong>Details</strong></th>
			<th><strong>Action</strong></th>
		</tr>
	</thead>
	<tbody>
		<?php 
		$num = 1;
		while(list($PublisherId, $name, $details) = mysqli_fetch_array($list_publisher))
		{
			?>
			<tr>
				<td class="col-md-1"><?= $num;?> </td>
				<td class="col-md-3"><?= $name;?> </td>
				<td class="col-md-6"><?= $details;?> </td>
				<td class="text-center col-md-2">
					<a class="btn btn-warning btn" href="?page=UpdatePublisher&PublisherId=<?php echo $PublisherId; ?>"><i class="fa fa-edit"></i></a>
					<a class='btn btn-danger' href="?page=DeletePublisher&PublisherId=<?php echo $PublisherId; ?>" onclick="return confirm('Are you sure deleting record?')"><i class="fa fa-remove"></i></a>
				</td>     
			</tr>
			<?php
			$num++;
		}
		?>
	</tbody>
</table>
