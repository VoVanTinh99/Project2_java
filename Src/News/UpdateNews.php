<?php 
$NewsId = 0;

if(isset($_GET['NewsId']))
	$NewsId=$_GET['NewsId'];

$NewsName = "";
$title = "";
$content="";
$employeecode="";
$result = searchNews($NewsId);
	//Lấy dữ liệu đưa vào mảng
if(isset($result))
{
	list($NewsId,$NewsName,$title,$content,$employeecode)=mysql_fetch_array($result);
}

	//Cập nhật lại dữ liệu
if(isset($_POST['btnUpdate']))
{
	$NewsId = $_GET['NewsId'];
	$NewsName=$_POST['txtName'];
	$title=$_POST['txtTitle'];
	$content=$_POST['txtContent'];
	$employeecode=$_POST['slEmpl'];
	UpdateNews($NewsId,$NewsName,$title,$content,$employeecode);
	echo '<script> alert("Cập nhật News thành công!");</script>';
	echo "<script>window.location.href='?page=news'</script>";
}

?>
<div class="row">
	<div class="col-md-12">
		<form action="" method="post" accept-charset="utf-8" enctype="multipart/form-data" form-horizontal>
			<div class="form_group">
				<label class="control-label col-sm-12" for="email"><h2 align="center">Udate News</h2></label>
			</div>
			</form>
		<form class="form-horizontal" accept-charset="utf-8" method="post" role="form" >
			<div class="form-group">
				<label class="control-label col-md-2" for="txtId">Code News:</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="NewsId"  name="NewsId"
					readonly="readonly" value="<?=$NewsId;?>" >
				</div>
			</div>



			<div class="form-group">
				<label class="control-label col-md-2" for="txtName"> News:</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="txtName"  name="txtName"
					required  value="<?=$NewsName;?>" >
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-2" for="txtTitle">Title:</label>
				<div class="col-md-10">          

					<input type="text" class="form-control" id="txtTitle" placeholder="Tựa đề" name="txtTitle"
					required value="<?=$title?>" >
				</div>
			</div>

			<div class="form-group">
				<label class="control-label col-md-2" for="txtContent">Content:</label>
				<div class="col-md-10">          
					<textarea name="txtContent" id="txtContent" class="form-control" placeholder="Nội dung"><?=$content;?></textarea>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-2" for="slEmpl">Employee:</label>
				<div class="col-md-10">  
					<?php
					$sqlSelect = "SELECT `EmployeeCode`, `EmployeePass`, `EmployeeName`, `EmployeeBirth`, `EmployeeAddress`, `EmployeeEmail`, `EmployeeIC`, `Role` FROM `employee`";
					$result = mysql_query($sqlSelect);
					$selectedValue = "";
					echo "<select name='slEmpl' class='form-control'>";
					while ($row=mysql_fetch_array($result,MYSQL_ASSOC)) 
					{
						if($row['EmployeeCode'] == $selectedValue)
						{
							echo "<option value='".$row['EmployeeCode']."' selected>".$row['EmployeeName']."</option>";
						}
						else
						{
							echo "<option value='".$row['EmployeeCode']."'>".$row['EmployeeName']."</option>";
						}
					}
					echo "</select>";
					
					?>
				</div>
			</div>
			<div class="form-group">        
				<div class="col-md-offset-2 col-md-10">
					<button type="submit" class="btn btn-info" name="btnUpdate" onclick=""><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Update</button>
					<button type="reset" class="btn btn-danger"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Cancel</button>
				</div>
			</div>
		</form>
	</div>
</div>
