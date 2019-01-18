<?php 
//Insert
$conn = mysqli_connect("localhost","root","","a_huy");
mysqli_set_charset($conn,'utf8');
function addEmployee($empCode,$empPass,$empName,$empBrith,$empAddress,$empMail,$empIC,$empRole)
{
	$conn = mysqli_connect("localhost","root","","a_huy");
	mysqli_set_charset($conn,'utf8');
	$sqlInsert="INSERT INTO 'employee'('EmployeeCode', 'EmployeePass', 'EmployeeName', 'EmployeeBirth', 'EmployeeAddress', 'EmployeeEmail', 'EmployeeIC', 'Role')VALUES ('$empCode','".md5($empPass)."','$empName','$empBrith','$empAddress','$empMail','$empIC','$empRole')";
	mysqli_query($conn,$sqlInsert);
}
function blindListRole()
{
	$conn = mysqli_connect("localhost","root","","a_huy");
	mysqli_set_charset($conn,'utf8');
	$sqlString="SELECT `RoleId`, `RoleName`, `RoleDetails`, `RoleActive` FROM `role`";
	$sqlresult = mysqli_query($conn,$sqlString);
	echo "<select name='slRole' class='form-control'><option value='0'>Vui lòng chọn quyền cho nhân viên của hệ thống</option>";

	while ($row = mysqli_fetch_array($sqlresult,MYSQLI_ASSOC)) {
		echo "<option value='".$row['RoleId']."'>".$row['RoleName']."</option>";

	}
	echo "</select>";
}
//Update
function searchEmployee($empCode)
{
	$select = 
	"SELECT 
	`EmployeeCode`, `EmployeePass`, `EmployeeName`, `EmployeeBirth`, `EmployeeAddress`, `EmployeeEmail`, `EmployeeIC`, `Role` 
	FROM `employee` 
	WHERE `EmployeeCode`='$empCode'";
	return mysqli_query($conn,$select);
}
function blindRoleUpdatetList($selectValue)
{
	$sqlSelect = "SELECT `RoleId`, `RoleName`, `RoleDetails`, `RoleActive` FROM `role`";
	$result = mysqli_query($conn,$sqlSelect);
	echo "<select> name='slRole' class='form-control'><option value='0'>Vui lòng chọn quyền</option>";
	while ($row=mysqli_fetch_array($result,MYSQLI_ASSOC)) 
	{
		if($row['RoleId'] == $selectedValue)
		{
			echo "<option value='".$row['RoleId']."' selected>".$row['RoleName']."</option>";
		}
		else
		{
			echo "<option value='".$row['RoleId']."'>".$row['RoleName']."</option>";
		}
	# code...

	}
	echo "</select>";
}

function updateEmployee($empPass,$empName,$empBrith,$empAddress,$empMail,$empIC,$empRole)
{
	$sqlUpdate=
	"UPDATE `employee` 
	SET 
	`EmployeePass`='$empPass',`EmployeeName`='$empName',
	`EmployeeBirth`='$empBrith',`EmployeeAddress`='$empAddress',
	`EmployeeEmail`='$empMail',`EmployeeIC`='$empIC',
	`Role`='$empRole' 
	WHERE 
	`EmployeeCode`='$empCode'";
	mysqli_query($conn,$sqlUpdate);
}
//Delete
function deleteEmployee($empCode)
{
	$delete = "DELETE FROM employee WHERE EmployeeCode='$empCode'";
	mysql_query($delete);
}

function deleteImageEmployee($id){
	$Imageid = $_GET["ImgEmployeeId"];
	$result= mysql_query("SELECT * FROM imageemployee WHERE ImgEmployeeId=$Imageid");
	$row = mysql_fetch_array($result, MYSQL_ASSOC);
	$fileDelete = $row['ImgEmployee'];
	$WineId = $row['EmployeeCode'];
	unlink("../../public/admin/images/".$fileDelete);
	mysql_query("DELETE FROM imageemployee WHERE ImgEmployeeId=$Imageid");
}
?>