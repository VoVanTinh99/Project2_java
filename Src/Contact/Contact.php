<script type="text/javascript">
	function deleteConfirm()
	{
		if(confirm("Are you sure you want to delete?")){
			return true;
		}
		else{
			return false;
		}
	}
</script>
<?php 
if(isset($_GET["ma"]))
{
	$conn = mysqli_connect("localhost","root","","a_huy");
	mysqli_set_charset($conn,'utf8');
	$malienhe = $_GET["ma"];
	mysqli_query($conn,"DELETE FROM `contact` WHERE ContactId=$$malienhe");
}
?>
<?php

if (isset($_POST['btnXoa'])&&isset($_POST['checkbox'])) 
{
	for ($i = 0; $i < count($_POST['checkbox']); $i++) 
	{
		$conn = mysqli_connect("localhost","root","","a_huy");
		mysqli_set_charset($conn,'utf8');
		$malienhe1  = $_POST['checkbox'][$i];
		mysqli_query($conn,"DELETE FROM `contact` WHERE ContactId=$malienhe1");
	}
}
?>
<div class="container">
<h4 class="text-center">MANAGE CONTACT</h4>
<form name="frmXoa" method="post">
<table id="myTable" class="table-striped table-hover table-responsive">
	<thead >
		<tr>
            <th><strong>Choice</strong></th>
			<th><strong>Num</strong></th>
			<th><strong>Full Name</strong></th>
            <th><strong>Date</strong></th>
			<th><strong>Information contact</strong></th>	
            <th><strong>Email</strong></th>
            <th><strong>Address</strong></th>	
            <th><strong>Phone</strong></th>
            <th><strong>Subject</strong></th>	
            <th><strong>Rely</strong></th>
			<th><strong>Method</strong></th>
		</tr>
	</thead>
    <tbody>
<?php

$result = mysqli_query($conn,
"SELECT `ContactId`, `SubjectName`, `Names`, `ContactDate`, `Information`, `Email`, `Phone`, `Address`, `RelyContact` FROM `contact` c
JOIN
subject s ON c.Subject = s.SubjectId
LIMIT 0,25");
; 
$num = 1;
while($row = mysqli_fetch_array($result))
{
?>
<tr>
            <td class="col-md-1"><input name="checkbox[]" type="checkbox" id="checkbox[]" value="<?php echo $row["ContactId"] ?>"></td>
            <td class="col-md-1"><?php echo $num ?></td>
            <td class="col-md-3"><?php echo $row["Names"] ?></td>
            <td class="col-md-3"><?php echo $row["ContactDate"] ?></td>
            <td class="col-md-1"><?php echo $row["Information"] ?></td>
            <td class="col-md-3"><?php echo $row["Phone"] ?></td>
            <td class="col-md-1"><?php echo $row["Email"] ?></td>
            <td class="col-md-3"><?php echo $row["Address"] ?></td>
            <td class="col-md-1"><?php echo $row["SubjectName"] ?></td>
            <td>
            <form  method="post" action="">
					<?php 
						if($row["RelyContact"]==0){
							echo '<a class="btn btn-default" href="?page=ActiveContact&RelyContact='.$row["RelyContact"].'&ContactId='.$row["ContactId"].'"><i class="fa fa-eye"></i></a>';
						}else{
							echo '<a class="btn btn-success" href="?page=ActiveContact&RelyContact='.$row["RelyContact"].'&ContactId='.$row["ContactId"].'"><i class=" fa fa-eye-slash"></i></a>';
						}
					?>
			</form>
            </td>
            <td class="col-md-3">
         
            <a class="btn btn-danger" href="?page=contact&ma=<?php echo $row['ContactId']; ?>" onclick="return deleteConfirm()">
								<i class="fa fa-remove"></i></a>
    
            </td>
</tr>
 <?php
$num++;
				}
				?>
	</tbody>
</table>
<div class="row" style="background-color:#FFF"><!--Nút chức nang-->
				<div class="col-md-12">
					<input type="submit" value="Delete All" name="btnXoa" id="btnXoa" onclick='return deleteConfirm()' class="btn btn-info"/>

				</div>
			</div>
</form>
</div>