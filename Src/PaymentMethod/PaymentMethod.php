<?php 
	$conn = mysqli_connect("localhost","root","","a_huy");
	mysqli_set_charset($conn,'utf8');
$sqlSelect = "SELECT `PaymentMethodId`, `PaymentMethodName`, `PaymentMethodDetails` FROM PaymentMethod";
$list_PaymentMethod= mysqli_query($conn,$sqlSelect);

?>
<h3 class="w3_inner_tittle two text-center">Payment Method</h3>
<a class="btn btn-primary" href="?page=AddPaymentMethod">Add <i class="fa fa-plus"></i></a> 
</br>
</br>
<table id="myTable" class="table-striped table-hover">
	<thead >
		<tr>
			<th><strong>Num</strong></th>
			<th><strong>Payment Names</strong></th>
			<th><strong>Details</strong></th>
			<th><strong>Action</strong></th>
		</tr>
	</thead>
	<tbody>
		<?php 
		$num = 1;
		while(list($PaymentMethodId, $PaymentMethodName, $PaymentMethodDetails) = mysqli_fetch_array($list_PaymentMethod))
		{
			?>
			<tr>
				<td class="col-md-1"><?= $num;?> </td>
				<td class="col-md-3"><?= $PaymentMethodName;?> </td>
				<td class="col-md-6"><?= $PaymentMethodDetails;?> </td>
				<td class="text-center col-md-2">
					<a class="btn btn-warning btn" href="?page=UpadatePaymentMethod&PaymentMethodId=<?php echo $PaymentMethodId; ?>"><i class="fa fa-edit"></i></a>
					<a class='btn btn-danger' href="?page=DeletePaymentMethod&PaymentMethodId=<?php echo $PaymentMethodId; ?>" onclick="return confirm('Bạn có chắc chắn xóa bản ghi này không?')"><i class="fa fa-remove"></i></a>
				</td>     
			</tr>
			<?php
			$num++;
		}
		?>
	</tbody>
</table>
