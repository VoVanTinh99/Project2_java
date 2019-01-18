<?php

function addUser($username, $password,$fullname,$sex,$phone,$email,$dayofbirth)
{
	$conn = mysqli_connect("localhost","root","","a_huy");
	mysqli_set_charset($conn,'utf8');
  $insert = "INSERT INTO 
  `User`(`Username`, `Password`, `FullName`, `Sex`, `Phone`, `Email`, `DateOfBirth`, `Status`, `Role`) 
  VALUES ('$username', '".md5($password)."', '$fullname', '$sex', '$phone', '$email', '$dayofbirth', 0,1)";
  mysqli_query($conn,$insert);
}
//Update User Layout
function updateUser($password,$fullname,$sex,$address,$phone,$email,$dateofbirthday, $identitycard)
{
	$updateUser = "UPDATE user
	SET Password = '$password', FullName = '$fullname', Sex = '$sex',Address='$address'
	,Phone='$phone',Email='$email',DateOfBirth='$dateofbirthday',IC='$identitycard'
	WHERE Username = '$username'";
	mysql_query($updateUser);
}
//Update User Admin
function blindRoleUpdatetList($selectValue)
{
	$sqlSelect = "SELECT `RoleId`, `RoleName`, `RoleDetails`, `RoleActive` FROM `role`";
	$result = mysql_query($sqlSelect);
	echo "<select> name='slRole' class='form-control'><option value='0'>Cập nhật lại quyền cho khách hàng này</option>";
	while ($row=mysql_fetch_array($result,MYSQL_ASSOC)) 
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
function updateUserAdmin($active,$status,$role)
{
	$updateUserAdmin = "UPDATE user
	SET `Active` = '$active', `Status`='status', `Role`='$role'
	WHERE 	Username = '$username' ";
	mysql_query($updateUserAdmin);

}
function searchUser($username)
{
	$sqlSelect = "
	SELECT
	 `Username`, `Password`, `FullName`, `Sex`, `Address`, `Phone`, `Email`, `DateOfBirth`, `IC`, `Status`, `Role` 
	 FROM `user` 
	 WHERE `Username`='$username'";
	 mysql_query($sqlSelect);
}
function deleteUser($username)

{
	$delete = "DELETE FROM `user` WHERE Username = $username";
	mysql_query($delete);
}


?>
