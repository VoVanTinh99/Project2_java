<?php 

include_once("SubjectController.php");
$sqlSelect = "SELECT `SubjectId`, `SubjectName` FROM Subject";
$list_Subject= mysqli_query($conn,$sqlSelect);

?>
<h3 class="w3_inner_tittle two text-center">Subject Contact</h3>
<a class="btn btn-primary" href="?page=AddSubject">ADD <i class="fa fa-plus"></i></a> 
<br>
<br>
<table id="myTable" class="table-striped table-hover">
	<thead >
		<tr>
			<th><strong>Num</strong></th>
			<th><strong>Names</strong></th>
			<th><strong>Action</strong></th>
		</tr>
	</thead>
	<tbody>
		<?php 
		$num = 1;
		while(list($SubjectId, $SubjectName) = mysqli_fetch_array($list_Subject))
		{
			?>
			<tr>
				<td class="col-md-1"><?= $num;?> </td>
				<td class="col-md-3"><?= $SubjectName;?> </td>
				<td class="text-center col-md-2">
					<a class="btn btn-warning btn" href="?page=UpadateSubject&SubjectId=<?php echo $SubjectId; ?>"><i class="fa fa-edit"></i></a>
					<a class='btn btn-danger' href="?page=DeleteSubject&SubjectId=<?php echo $SubjectId; ?>" onclick="return confirm('Are you delete?')"><i class="fa fa-remove"></i></a>
				</td>     
			</tr>
			<?php
			$num++;
		}
		?>
	</tbody>
</table>
