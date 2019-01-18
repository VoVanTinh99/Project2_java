
<?php 

function addRole($name,$description,$rolecctive)
{
	$conn = mysqli_connect("localhost","root","","a_huy");
	mysqli_set_charset($conn,'utf8');
	$insert="INSERT INTO `Role`(`RoleName`, `RoleDetails`, `RoleActive`) VALUES ('$name','$description','$rolecctive')";
	mysqli_query($conn,$insert);
}
function deleteRole($RoleId)
{
	$conn = mysqli_connect("localhost","root","","a_huy");
	mysqli_set_charset($conn,'utf8');
	$delete = "DELETE FROM Role WHERE RoleId=$RoleId";
	mysqli_query($conn,$delete);
}
//Update

function updateRole($RoleId, $name,$description,$rolecctive)
{
	$conn = mysqli_connect("localhost","root","","a_huy");
	mysqli_set_charset($conn,'utf8');
	$update = 
	"UPDATE Role 
	SET RoleName = '$name',RoleDetails='$description',RoleActive='$rolecctive'
	WHERE RoleId='$RoleId'";
	mysqli_query($conn,$update);
}
function searchRole($RoleId)
{
	$conn = mysqli_connect("localhost","root","","a_huy");
	mysqli_set_charset($conn,'utf8');
	$select = 
	"SELECT RoleId,RoleName,RoleDetails,RoleActive
	FROM Role
	WHERE RoleId='$RoleId'";
	return mysqli_query($conn,$select);
}
?>