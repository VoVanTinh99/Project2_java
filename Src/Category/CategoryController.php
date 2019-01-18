<?php 
function addCategory($name,$description)
{
	$conn = mysqli_connect("localhost","root","","a_huy");
	mysqli_set_charset($conn,'utf8');
	$insert = "INSERT INTO `Category`(`CategoryName`, `CategoryDescription`) VALUES ('$name','$description')";
	mysqli_query($conn,$insert);
}
function deleteCategory($CategoryId)
{
	$delete = "DELETE FROM Category WHERE CategoryId=$CategoryId";
	mysqli_query($conn,$delete);
}
function updateCategory($CategoryId,$name,$description)
{
	$update = 
	"UPDATE Category 
	SET CategoryName = '$name',CategoryDescription='$description'
	WHERE CategoryId='$CategoryId'";
	mysqli_query($conn,$update);
}
function searchCategory($CategoryId)
{
	$conn = mysqli_connect("localhost","root","","a_huy");
	mysqli_set_charset($conn,'utf8');
	$select = 
	"SELECT CategoryId,CategoryName,CategoryDescription
	FROM Category
	WHERE CategoryId='$CategoryId'";
	return mysqli_query($conn,$select);
}
?>