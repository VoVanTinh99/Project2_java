<?php 
$conn = mysqli_connect("localhost","root","","a_huy");
mysqli_set_charset($conn,'utf8');
function searchAbout($AboutId)

{
	$sqlSelect = "
	SELECT `AboutId`, `AboutName`, `AboutWinsor`, `EmployeeCode` FROM `about` WHERE `AboutId`='$AboutId'";
	return mysqli_query($conn,$sqlSelect);
}
function UpdateAbout($AboutId,$AboutName,$AboutContent,$employeecode)
{
	$sqlUpdate = "UPDATE `about` SET 
	AboutName = '$AboutName',
	AboutWinsor = '$AboutContent',
	EmployeeCode = '$employeecode'
	WHERE	AboutId = '$AboutId'";
	mysqli_query($conn,$sqlUpdate);

}
?>
<?php 

$AboutId = 0;

if(isset($_GET['AboutId']))
$AboutId=$_GET['AboutId'];

$AboutName = "";
$AboutContent = "";

$employeecode="";
$result = searchAbout($AboutId);
	//Lấy dữ liệu đưa vào mảng
if(isset($result))
{
	list($AboutId,$AboutName,$AboutContent,$employeecode)=mysqli_fetch_array($result);
}

	//Cập nhật lại dữ liệu
if(isset($_POST['btnUpdate']))
{
	$AboutId = $_GET['AboutId'];
	$AboutName=$_POST['txtName'];
	$AboutContent=$_POST['txtHistory'];
	$employeecode=$_POST['slEmpl'];
	UpdateAbout($AboutId,$AboutName,$AboutContent,$employeecode);
	echo '<script> alert("Cập nhật thành công!");</script>';
	echo "<script>window.location.href='?page=about'</script>";
}

?>
<div class="row">
	<div class="col-md-12"/>
	<form action="" method="post" accept-charset="utf-8" enctype="multipart/form-data" form-horizontal>
		<div class="form_group">
			<label class="control-label col-sm-12" for="email"><h2 align="center">Về Chúng Tôi</h2></label>
		</div>

	</form>
	<form class="form-horizontal" accept-charset="utf-8" method="post" role="form" >

<div class="form-group">
				<label class="control-label col-md-2" for="txtId">Mã Số:</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="NewsId"  name="NewsId"
					readonly="readonly" value="<?=$AboutId;?>" >
				</div>
			</div>
		<div class="form-group">
			<label class="control-label col-md-2" for="txtName">About Us:</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" id="txtName" placeholder="Enter About Us" name="txtName"
				required autofocus value="<?=$AboutName;?>">
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-md-2" for="txtHistory">About Content:</label>
			<div class="col-md-10">          

				<textarea name="txtHistory" id="txtHistory"
				placeholder="Enter Content" class="form-control" required ><?=$AboutContent;?></textarea>
			</div>
		</div>
        <div class="form-group">
			<label class="control-label col-md-2" for="slEmpl">Employee:</label>
			<div class="col-md-10">          
			<?php
					$sqlSelect = "SELECT `EmployeeCode`, `EmployeePass`, `EmployeeName`, `EmployeeBirth`, `EmployeeAddress`, `EmployeeEmail`, `EmployeeIC`, `Role` FROM `employee`";
					$result = mysqli_query($conn,$sqlSelect);
					$selectedValue = "";
					echo "<select name='slEmpl' class='form-control'>";
					while ($row=mysqli_fetch_array($result,MYSQLI_ASSOC)) 
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
				<button type="submit" class="btn btn-info" name="btnUpdate" onclick=""><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Cập Nhật</button>
				<button type="reset" class="btn btn-danger"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Bỏ Qua</button>
			</div>
		</div>
	</form>
</div>