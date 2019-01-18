<div class="container">
	<h4 class="text-center">Bill</h4>
	<table id="myTable" class="table-striped table-hover table-responsive">
		<thead >
			<tr>
				<th><strong>Num</strong></th>
				<th><strong>Wine</strong></th>
				<th><strong>Quantity</strong></th>
				<th><strong>Order date</strong></th>	
				<th><strong>Order Receive</strong></th>
				<th><strong>Recipients</strong></th>
				<th><strong>Receiver</strong></th>
				<th><strong>Payment</strong></th>
				<th><strong>Price</strong></th>
				<th><strong>Status</strong></th>
				<th><strong>Print</strong></th>
			</tr>
		</thead>
		<tbody>
			<?php

			$result = mysqli_query($conn,
				"SELECT 
				o.OrderId,w.WineName ,o.OrderCreateDate, o.OrderDeliverDate,
				o.OrderDeliverPlace, o.OrderStatus, u.FullName, 
				p.PaymentMethodName,or1.WineSoldPrice, or1.WineOrderQuantity 
				FROM `order` o
				JOIN paymentmethod p ON o.PaymentMethodId = p.PaymentMethodId
				JOIN user u ON o.Username = u.Username
				JOIN orderwinedetails or1 ON o.OrderId = or1.OrderId 
				JOIN wine w ON or1.WineOrderId = w.WineId
				LIMIT 0,25");
			; 
			$num = 1;
			while($row = mysqli_fetch_array($result))
			{
				?>
				<tr>
					<td><?php echo $num ?></td>
					<td><?php echo $row["WineName"] ?></td>
					<td><?php echo $row["WineOrderQuantity"] ?></td>
					<td><?php echo $row["OrderCreateDate"] ?></td>
					<td><?php echo $row["OrderDeliverDate"] ?></td>
					<td><?php echo $row["OrderDeliverPlace"] ?></td>
					<td><?php echo $row["FullName"] ?></td>
					<td><?php echo $row["PaymentMethodName"] ?></td>
					<td><?php echo $row["WineSoldPrice"] ?></td>
					<td>
						<form  method="post" action="">
							<?php 
							if($row["OrderStatus"]==0){
								echo '<a class="btn btn-default" href="?page=ActiveOrder&OrderStatus='.$row["OrderStatus"].'&OrderId='.$row["OrderId"].'"><i class="fa fa-eye"></i></a>';
							}else{
								echo '<a class="btn btn-success" href="?page=ActiveOrder&OrderStatus='.$row["OrderStatus"].'&OrderId='.$row["OrderId"].'"><i class=" fa fa-eye-slash"></i></a>';
							}
							?>
						</form>
					</td>
					<td>
						<form method="post" action="../Src/Customer/OrderPrint.php">
							<input type="hidden" name="OrderId" value="<?=$row['OrderId'] ?>">
							<button type="submit" class="btn btn-info"><i class="fa fa-print"></i></button>
						</form>
					</td>
				</tr>
				<?php
				$num++;
			}
			?>
		</tbody>
	</table>
</div>